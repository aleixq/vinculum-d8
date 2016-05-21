<?php
/**
 * @file
 * Contains \Drupal\vinculum\VinculumReceivedInterface.
 */

namespace Drupal\vinculum;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a VinculumReceived entity.
 *
 * We have this interface so we can join the other interfaces it extends.
 *
 * @ingroup vinculum
 */
interface VinculumReceivedInterface extends ContentEntityInterface, EntityChangedInterface {

}
