<?php

namespace Drupal\linkback\Plugin\Validation\Constraint;

use Drupal\Core\Entity\Plugin\Validation\Constraint\CompositeConstraintBase;

/**
 * Supports validating linkback not registered.
 *
 * @Constraint(
 *   id = "UnregisteredLinkback",
 *   label = @Translation("Linkback not registered", context = "Validation"),
 *   type = "entity:linkback"
 * )
 */
class UnregisteredLinkbackConstraint extends CompositeConstraintBase {

  /**
   * Message shown when a linkback is already registered.
   *
   * @var string
   */
  public $linkbackRegistered = 'The linkback from url (%url) to content with id %ref_content is already registered.';

  /**
   * Message shown when a linkback receive is not enabled for this content id. TODO.
   *
   * @var string
   */
  public $linkbackDisabled = 'Content with id %ref_content has the receive linkbacks disabled.';

  /**
   * {@inheritdoc}
   */
  public function coversFields() {
    return ['url', 'ref_content'];
  }

}
