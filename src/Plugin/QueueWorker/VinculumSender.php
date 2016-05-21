<?php
/**
 * @file
 * Contains Drupal\vinculum\Plugin\QueueWorker\VinculumSender.php
 */

namespace Drupal\vinculum\Plugin\QueueWorker;


use Drupal\vinculum\Exception\VinculumException;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DomCrawler\Crawler;
use Drupal\Component\EventDispatcher\ContainerAwareEventDispatcher;
use Drupal\vinculum\Event\VinculumSendEvent;
use Drupal\vinculum\Event\VinculumSendRulesEvent;

/**
 * Provides base functionality for the VinculumSender Queue Workers.
 */
abstract class VinculumSender extends QueueWorkerBase implements ContainerFactoryPluginInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface|\Prophecy\Prophecy\ProphecyInterface
   */
  protected $entityTypeManager;

  /**
   * Entity Field Manager.
   *
   * @var Drupal/Core/Entity/EntityFieldManagerInterface
   */
  protected $fieldManager;

  /**
   * The event dispatcher.
   *
   * @var Symfony\Component\EventDispatcher\EventDispatcher
   */ 
   protected $eventDispatcher;

  /**
   * Creates a new VinculumSender object.
   *
   * @param \Drupal/Core/Entity/EntityFieldManagerInterface $field_manager
   *   Entity Field Manager.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Symfony\Component\EventDispatcher\EventDispatcher
   *   The event dispatcher.
   */
  public function __construct(EntityFieldManagerInterface $field_manager, EntityTypeManagerInterface $entity_type_manager, ContainerAwareEventDispatcher $event_dispatcher) {
    $this->fieldManager = $field_manager; 
    $this->entityTypeManager = $entity_type_manager;
    $this->eventDispatcher = $event_dispatcher;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $container->get('entity_field.manager'),
      $container->get('entity_type.manager'),
      $container->get('event_dispatcher')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    /** @var EntityInterface|Bool $content */
    $content = FALSE;
    $send_allowed = TRUE;

    $field_type = $this->fieldManager->getFieldMapByFieldType('vinculum_handlers');
    foreach ($field_type as $entity_type_id => $field){
      $storage = $this->entityTypeManager->getStorage($entity_type_id);
      $content = $storage->load( $data->id() );
      if ($content){
        $field_name = array_keys($field)[0];
        $field_send_allowed = $content->get($field_name)->vinculum_send;
        $default = $content->get($field_name)->getFieldDefinition()->getDefaultValueLiteral()[0]['vinculum_send'];
        $send_allowed = (isset( $field_send_allowed)) ? $field_send_allowed : $default ;
        break;
      }
    }
    if (!$content){
      return;
    }
    if (!$send_allowed){
      return;
    }
    //SEND VINCULUMS VIA EVENT SUBSCRIBER
    //TODO allow other type of fields than body to be scanned to send vinculums.
    /** @var $urls string[] **/ 
    $urls = $this->getBodyUrls($content->get('body')->value);

    foreach ($urls as $target_url){
      $target_url = Url::fromUri($target_url);
      //TODO: Add batch process as in https://api.drupal.org/api/drupal/core%21modules%21locale%21src%21Plugin%21QueueWorker%21LocaleTranslation.php/function/LocaleTranslation%3A%3AprocessItem/8.2.x
      $event = new VinculumSendEvent($content->toUrl('canonical', ['absolute' => TRUE ] ), $target_url);
      $this->eventDispatcher->dispatch(VinculumSendEvent::EVENT_NAME, $event);
      $event = new VinculumSendRulesEvent($content, $target_url->setOption('absolute', TRUE)->toString() );
      $this->eventDispatcher->dispatch(VinculumSendRulesEvent::EVENT_NAME, $event);
    }

  }

 /**
  * Get urls from a body html
  *
  * @param string $body
  *   The html body 
  * @return
  *   An array with title and excerpt or throws exception in case of problems[ means VINCULUM_ERROR_REMOTE_URL_MISSING_LINK ].   
  *
  */
  protected function getBodyUrls($body){
    $crawler = new Crawler($body);
    return array_unique($crawler->filter("a[href]")->extract(array('href')) );
  }
}
