<?php

/**
 * @file
 * Contains \Drupal\mymodule\UnitInterface.
 */

namespace Drupal\mymodule;

/**
 * Interface UnitInterface.
 */
interface UnitInterface {

  /**
   * Returns the unit's label.
   *
   * @return string
   *   The unit's label.
   */
  public function getLabel();

  /**
   * Returns the unit abbreviation..
   *
   * @return string
   *    The abbreviation.
   */
  public function getUnit();

  /**
   * Returns the factor amount for conversions.
   *
   * @return int|float
   *   The factor amount.
   */
  public function getFactor();

  /**
   * Converts a value to the base unit.
   *
   * @param int|float $value
   *    The amount to convert.
   *
   * @return int|float
   *   The converted amount.
   */
  public function toBase($value);

  /**
   * Converts value from base unit to current unit.
   *
   * @param int|float $value
   *    The amount to convert.
   *
   * @return int|float
   *   The converted amount.
   */
  public function fromBase($value);

  /**
   * Rounds a value.
   *
   * @param int|float $value
   *    The value to round.
   *
   * @return int|float
   *   The rounded value.
   */
  public function round($value);
}
