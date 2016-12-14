<?php

/**
 * @file Contains \Drupal\mymodule\MessageListBuilder
 */

namespace Drupal\mymodule;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

class MessageListBuilder extends EntityListBuilder {
  public function buildHeader() {
    $header['title'] = t('Title');
    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity) {
    $row['title'] = $entity->label();
    return $row + parent::buildRow($entity);
  }

}
