<?php

namespace Drupal\linkback\Plugin\views\wizard;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\wizard\WizardPluginBase;

/**
 * Provides a views wizard for My Entity entities.
 *
 * @ViewsWizard(
 *   id = "linkback",
 *   base_table = "linkback_received",
 *   title = @Translation("Linkback")
 * )
 */
class Linkback extends WizardPluginBase {
}
