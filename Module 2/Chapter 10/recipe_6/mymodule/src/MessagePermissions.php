<?php

/**
 * @file
 * Contains \Drupal\profile\MessagePermissions.
 */

namespace Drupal\mymodule;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\mymodule\Entity\MessageType;

/**
 * Defines a class containing permission callbacks.
 */
class MessagePermissions {
  use StringTranslationTrait;

  /**
   * Returns an array of message type permissions.
   *
   * @return array
   *    Returns an array of permissions.
   */
  public function messageTypePermissions() {
    $perms = [];
    // Generate message permissions for all message types.
    foreach (MessageType::loadMultiple() as $type) {
      $perms += $this->buildPermissions($type);
    }
    return $perms;
  }

  /**
   * Builds a standard list of permissions for a given profile type.
   *
   * @param \Drupal\mymodule\Entity\MessageType $message_type
   *   The machine name of the message type.
   *
   * @return array
   *   An array of permission names and descriptions.
   */
  protected function buildPermissions(MessageType $message_type) {
    $type_id = $message_type->id();
    $type_params = ['%type' => $message_type->label()];

    return [
      "add $type_id message" => [
        'title' => $this->t('%type: Add message', $type_params),
      ],
      "view $type_id message" => [
        'title' => $this->t('%type: View message', $type_params),
      ],
      "edit $type_id message" => [
        'title' => $this->t('%type: Edit message', $type_params),
      ],
      "delete $type_id message" => [
        'title' => $this->t('%type: Delete message', $type_params),
      ],
    ];
  }
}
