<?php

namespace Drupal\vinculum\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of the 'vinculum_default_widget' widget.
 *
 * @FieldWidget(
 *   id = "vinculum_default_widget",
 *   label = @Translation("Vinculum default widget"),
 *   field_types = {
 *     "vinculum_handlers"
 *   }
 * )
 */
class VinculumDefaultWidget extends WidgetBase implements ContainerFactoryPluginInterface {
  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * {@inheritdoc}
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, AccountInterface $current_user) {
   parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, array());
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $container->get('current_user')
    );
  }

  /**
   * {@inheritdoc}
   */
  //TODO allow extra vinculums methods here.
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = [];
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  //TODO allow extra vinculums methods here.
  public function settingsSummary() {
    $summary = [];
    return $summary;
  }
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = [];

    $elements['vinculum_send'] = array(
      '#type' => 'checkbox',
      '#title' => t('Send vinculums'),
      '#default_value' => isset($items->vinculum_send) ? $items->vinculum_send : TRUE,
      '#access' => $this->currentUser->hasPermission('toggle vinculum send option on content'),
    );
    $elements['vinculum_receive'] = array(
      '#type' => 'checkbox',
      '#title' => t('Receive vinculums'),
      '#default_value' => isset($items->vinculum_receive) ? $items->vinculum_receive : TRUE,
      '#access' => $this->currentUser->hasPermission('toggle vinculum receive option on content'),
    );
    // If the advanced settings tabs-set is available (normally rendered in the
    // second column on wide-resolutions), place the field as a details element
    // in this tab-set.
    if (isset($form['advanced'])) {
      $elements += array(
        '#type' => 'details',
        '#group' => 'advanced',
      );
    }

    return $elements;
  }

}
