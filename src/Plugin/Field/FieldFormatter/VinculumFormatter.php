<?php

namespace Drupal\vinculum\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'vinculum_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "vinculum_formatter",
 *   label = @Translation("Vinculum formatter"),
 *   field_types = {
 *     "vinculum_handlers"
 *   }
 * )
 */
class VinculumFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
   //TODO ALLOW OTHER VINCULUMS HANDLERS
  public static function defaultSettings() {
    return array(
      // Implement default settings.
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return array(
      // Implement settings form.
    ) + parent::settingsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    // Implement settings summary.

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    //TODO CALL MODULE_IMPLEMENT INVOKE_ALL HOOKS!
    foreach ($items as $delta => $item) {
      $elements[$delta] = ['#markup' => $this->viewValue($item)];
    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
      $send = ($item->vinculum_send) ? $this->t('Send vinculums option is enabled') : $this->t('Send vinculums option is disabled');
      $receive = ($item->vinculum_receive) ? $this->t('Receive vinculums option is enabled') : $this->t('Receive vinculums option is disabled');
      return $send . "<br/>" . $receive;
  }

}
