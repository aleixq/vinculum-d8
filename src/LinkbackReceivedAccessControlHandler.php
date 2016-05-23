<?php
/**
 * @file
 * Contains \Drupal\linkback\LinkbackReceivedAccessControlHandler.
 */

namespace Drupal\linkback;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines an access control handler for the linkback received entity.
 *
 * @see \Drupal\linkback\Entity\LinkbackReceived
 */
class LinkbackReceivedAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'access linkbacks');
        break;

      default:
        return AccessResult::allowedIfHasPermission($account, 'administer linkback');
        break;
    }
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'administer linkback');
  }

}
