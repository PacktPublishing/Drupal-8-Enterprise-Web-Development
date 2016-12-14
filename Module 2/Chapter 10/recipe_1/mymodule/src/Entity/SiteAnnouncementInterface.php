<?php

/**
 * @file Contains \Drupal\mymodule\Entity\SiteAnnouncementInterface
 */

namespace Drupal\mymodule\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

interface SiteAnnouncementInterface  extends ConfigEntityInterface {

  /**
   * Gets the message value.
   *
   * @return string
   */
  public function getMessage();

}
