<?php
/**
 * @file
 * Contains \Drupal\vinculum\VinculumReceivedAccessControlHandler.
 */

namespace Drupal\vinculum;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines an access control handler for the vinculum received entity.
 *
 * @see \Drupal\vinculum\Entity\VinculumReceived
 */
class VinculumReceivedAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'access vinculums');
        break;

      default:
        return AccessResult::allowedIfHasPermission($account, 'administer vinculum');
        break;
    }
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'administer vinculum');
  }

}
