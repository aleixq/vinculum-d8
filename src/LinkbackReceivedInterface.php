<?php
/**
 * @file
 * Contains \Drupal\linkback\LinkbackReceivedInterface.
 */

namespace Drupal\linkback;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a LinkbackReceived entity.
 *
 * We have this interface so we can join the other interfaces it extends.
 *
 * @ingroup linkback
 */
interface LinkbackReceivedInterface extends ContentEntityInterface, EntityChangedInterface {

}
