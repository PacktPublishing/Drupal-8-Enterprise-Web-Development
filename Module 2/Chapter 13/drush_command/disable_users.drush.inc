<?php

/**
 * @file
 * Loads all users who have not logged in within 10 days and disables them.
 */

/**
 * Implements hook_drush_command().
 **/
function disable_users_drush_command() {
  $items = [];
  $items['disable-users'] = [
    'description' => 'Disables users after 10 days of inactivity',
  ];
  return $items;
}

/**
 * Implements drush_hook_COMMAND().
 */
function drush_disable_users_disable_users() {
  // Get the default timezone and make a DateTime object for 10 days ago.
  $system_date = \Drupal::config('system.date');
  $default_timezone = $system_date->get('timezone.default') ?: date_default_timezone_get();
  $now = new DateTime('now', new DateTimeZone($default_timezone));
  $now->modify('-10 days');

  $query = \Drupal::entityQuery('user')
    ->condition('login', $now->getTimestamp(), '>');
  $results = $query->execute();

  if (empty($results)) {
    drush_print('No users to disable!');
  }

  foreach ($results as $uid) {
    /** @var \Drupal\user\Entity\User $user */
    $user = \Drupal\user\Entity\User::load($uid);
    $user->block();
    $user->save();
  }

  drush_print(dt('Disabled !count users', ['!count' => count($results)]));
}

