<?php

/**
 * @file Contains \Drupal\mymodule\MessageAccessControlHandler.
 */

namespace Drupal\mymodule;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the access control handler for the message entity type.
 */
class MessageAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    // Re-use admin permission check.
    $result = parent::checkAccess($entity, $operation, $account);

    if ($result->isNeutral()) {
      // Check if user has permission: ex, "add message message".
      $result = AccessResult::allowedIfHasPermission($account, "$operation {$entity->bundle()} message");
    }

    return $result;
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    // Re-use admin permission check.
    $result = parent::checkCreateAccess($account, $context, $entity_bundle);

    if ($result->isNeutral()) {
      $result = AccessResult::allowedIfHasPermission($account, "add $entity_bundle message");
    }

    return $result;
  }


}
