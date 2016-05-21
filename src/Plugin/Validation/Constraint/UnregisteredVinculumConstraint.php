<?php

namespace Drupal\vinculum\Plugin\Validation\Constraint;

use Drupal\Core\Entity\Plugin\Validation\Constraint\CompositeConstraintBase;

/**
 * Supports validating vinculum not registered.
 *
 * @Constraint(
 *   id = "UnregisteredVinculum",
 *   label = @Translation("Vinculum not registered", context = "Validation"),
 *   type = "entity:vinculum"
 * )
 */
class UnregisteredVinculumConstraint extends CompositeConstraintBase {

  /**
   * Message shown when a vinculum is already registered.
   *
   * @var string
   */
  public $vinculumRegistered = 'The vinculum from url (%url) to content with id %ref_content is already registered.';

  /**
   * Message shown when a vinculum receive is not enabled for this content id. TODO
   *
   * @var string
   */
  public $vinculumDisabled = 'Content with id %ref_content has the receive vinculums disabled.';




  /**
   * {@inheritdoc}
   */
  public function coversFields() {
    return ['url', 'ref_content'];
  }

}
