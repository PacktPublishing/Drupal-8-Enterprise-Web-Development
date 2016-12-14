<?php

/**
 * @file Contains \Drupal\mymodule\MessageHtmlRouteProvider.
 */

namespace Drupal\mymodule;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider;
use Drupal\mymodule\Entity\MessageType;
use Symfony\Component\Routing\Route;

/**
 * Provides HTML routes for the message entity type.
 */
class MessageHtmlRouteProvider extends DefaultHtmlRouteProvider {

  /**
   * {@inheritdoc}
   */
  public function getRoutes(EntityTypeInterface $entity_type) {
    $collection = parent::getRoutes($entity_type);

    $route = (new Route('/messages/add'))
      ->addDefaults([
        '_entity_form' => 'message.add',
        '_title' => 'Add message',
      ])
      ->setRequirement('_entity_create_access', 'message');
    $collection->add('entity.message.add_form', $route);

    /** @var \Drupal\mymodule\Entity\MessageTypeInterface $message_type */
    foreach (MessageType::loadMultiple() as $message_type) {
      $route = (new Route('/messages/add/{message_type}'))
        ->addDefaults([
          '_entity_form' => 'message.add',
          '_title' => "Add {$message_type->label()} message",
        ])
        ->setRequirement('_entity_create_access', 'message');
      $collection->add("entity.message.{$message_type->id()}.add_form", $route);
    }

    return $collection;
  }
}
