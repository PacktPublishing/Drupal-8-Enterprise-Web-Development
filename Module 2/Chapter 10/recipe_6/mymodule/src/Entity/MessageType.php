<?php

/**
 * @file Contains \Drupal\mymodule\Entity\MessageType.
 */

namespace Drupal\mymodule\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the profile type entity class.
 *
 * @ConfigEntityType(
 *   id = "message_type",
 *   label = @Translation("Message type"),
 *   handlers = {
 *     "list_builder" = "Drupal\profile\MessageTypeListBuilder",
 *     "form" = {
 *       "default" = "Drupal\Core\Entity\EntityForm",
 *       "add" = "Drupal\Core\Entity\EntityForm",
 *       "edit" = "Drupal\Core\Entity\EntityForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "message_type",
 *   bundle_of = "message",
 *   admin_permission = "administer messages",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/message-types/add",
 *     "delete-form" = "/admin/structure/message-types/{message_type}/delete",
 *     "edit-form" = "/admin/structure/message-types/{profile_type}",
 *     "admin-form" = "/admin/structure/message-types/{profile_type}",
 *     "collection" = "/admin/structure/message-types"
 *   }
 * )
 */
class MessageType extends ConfigEntityBundleBase implements MessageTypeInterface {

}
