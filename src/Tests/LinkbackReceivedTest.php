<?php
/**
 * @file
 * Unit tests for the LinkbackReceived Entity.
 *
 * Intro: https://api.drupal.org/api/drupal/core!core.api.php/group/testing/8.
 */
/**
 * @file
 * Contains \Drupal\Tests\linkback\Kernel\LinkbackReceivedTest.
 */
namespace Drupal\linkback\Tests;

use Drupal\simpletest\WebTestBase;
use Drupal\simpletest\KernelTestBase;
use \Drupal\linkback\Entity\LinkbackReceived;
use Drupal\Core\Url;

/**
 * @coversDefaultClass \Drupal\linkback\Entity\LinkbackReceived
 * @group linkback
 */
class LinkbackReceivedTest extends WebTestBase {
  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['node', 'entity_reference', 'linkback', 'linkback_pingback', 'file', 'system'];
  /**
   * {@inheritDoc}.
   */
  protected function setUp() {
    parent::setUp();
//    $this->installEntitySchema('linkback');
  }
  /**
   * Saves an linkback & make sure values are properly set.
   */
  public function testSaveLinkbackReceived() {
    /*
    // Create a node with our user as the creator.
    // drupalCreateNode() uses the logged-in user by default.
    $settings = array(
      'type' => 'simpletest_example',
      'title' => $this->randomMachineName(32),
    );
    $node = $this->drupalCreateNode($settings);
    
    //TODO ADD NODE  with linkback field and get urls
    $source_uri = "http://planet8.sb.communia.org/content/qonfluo-el-software-de-streaming-de-communia";
    $target = "http://planet8.sb.communia.org/content/curs-3d-printing";
    //$ref_content = Url::fromUserInput(str_replace($base_url, "", $target ) )->getRouteParameters()['node']; 
    $ref_content = $node->id;
    // Create an entity.
  $entity = LinkbackReceived::create([
    'handler'  => 'linkback_pingback',
    'ref_content' => $ref_content,
    'url'      => $source_uri,
  ]);



    // Save it.
    $entity->save();
    // Get the id.
    $id = $entity->id();
    // Load the saved entity.
    $saved_entity = LinkbackReceived::load($id);
    // Check label.
    $this->assertEqual($label, $saved_entity->label(), 'Label created successfully', 'label');
    */
  }
  /**
   * Saves an linkback & makes sure the uuid is set.
   */
  public function testLinkbackReceivedUuid() {
    /* TODO
    $source_uri = "";
    $target = "";
    global $base_url;
    $ref_content = Url::fromUserInput(str_replace($base_url, "", $target ) )->getRouteParameters()['node']; 
    // Create an entity.
  $entity = LinkbackReceived::create([
    'handler'  => 'linkback_pingback',
    'ref_content' => $ref_content,
    'url'      => $source_uri,
  ]);

  if ($result = $entity->save()) {
    // Successful: provide a meaningful response.
    if ($result == SAVED_NEW) {
      $message = t('Pingback from @source to @target registered.', array('@source' => $source_uri, '@target' => $target_uri));
    }
    elseif ($result == SAVED_UPDATED) {
      $message = t('Pingback from @source to @target updated.', array('@source' => $source_uri, '@target' => $target_uri));
    }
    }

    // Save it.
    $entity->save();
    // Get the uuid.
    $uuid = $entity->uuid();
    // Get the id.
    $id = $entity->id();
    // Load the saved entity.
    $saved_entity = LinkbackReceived::load($id);
    // Check UUID.
    $this->assertEqual($uuid, $saved_entity->uuid(), 'UUID created successfully', 'uuid');
    // Check the string length of uuid is 36.
    $this->assertEqual(strlen($uuid), 36, 'UUID length is 36', 'uuid');
  }
  */

}
