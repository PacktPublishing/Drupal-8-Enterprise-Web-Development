<?php

/**
 * @file
 * Contains \Drupal\mymodule\Plugin\Field\FieldFormatter\RealNameFormatter
 */

namespace Drupal\mymodule\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'realname_one_line' formatter.
 *
 * @FieldFormatter(
 *   id = "realname_one_line",
 *   label = @Translation("Real name (one line)"),
 *   field_types = {
 *     "realname"
 *   }
 * )
 */

class RealNameFormatter extends FormatterBase {
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      $element[$delta] = array(
        '#markup' => $this->t('@first @last', array(
            '@first' => $item->first_name,
            '@last' => $item->last_name,
          )
        ),
      );
    }
    return $element;
  }
}
