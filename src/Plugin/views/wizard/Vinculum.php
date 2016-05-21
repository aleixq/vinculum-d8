<?php 

namespace Drupal\vinculum\Plugin\views\wizard;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\wizard\WizardPluginBase;

/**
 * Provides a views wizard for My Entity entities.
 *
 * @ViewsWizard(
 *   id = "vinculum",
 *   base_table = "vinculum_received",
 *   title = @Translation("Vinculum")
 * )
 */
class Vinculum extends WizardPluginBase {
}
