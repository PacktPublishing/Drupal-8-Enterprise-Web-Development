<?php

/**
 * @file Contains \Drupal\mymodule\Entity\SiteAnnouncement
 */

namespace Drupal\mymodule\Entity;


use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * @ConfigEntityType(
 *   id ="announcement",
 *   label = @Translation("Site Announcement"),
 *   handlers = {
 *     "list_builder" = "Drupal\mymodule\SiteAnnouncementListBuilder",
 *     "form" = {
 *       "default" = "Drupal\mymodule\SiteAnnouncementForm",
 *       "add" = "Drupal\mymodule\SiteAnnouncementForm",
 *       "edit" = "Drupal\mymodule\SiteAnnouncementForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     }
 *   },
 *   config_prefix = "announcement",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   },
 *   links = {
 *     "delete-form" = "/admin/config/system/site-announcements/manage/{announcement}/delete",
 *     "edit-form" = "/admin/config/system/site-announcements/manage/{announcement}",
 *     "collection" = "/admin/config/system/site-announcements",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "message",
 *   }
 * )
 */
class SiteAnnouncement extends ConfigEntityBase implements SiteAnnouncementInterface {

  /**
   * The announcement's message.
   *
   * @var string
   */
  protected $message;

  /**
   * {@inheritdoc|
   */
  public function getMessage() {
    return $this->message;
  }


}
