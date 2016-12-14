<?php

/**
 * @file
 * Contains \Drupal\mymodule\UnitManager.
 */

namespace Drupal\mymodule;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

class UnitManager extends DefaultPluginManager {
  /**
   * Default values for each unit plugin.
   *
   * @var array
   */
  protected $defaults = [
    'id' => '',
    'label' => '',
    'unit' => '',
    'factor' => 0.00,
    'type' => '',
    'class' => 'Drupal\mymodule\Unit',
  ];

  /**
   * Constructs a new \Drupal\mymodule\UnitManager object.
   *
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    $this->moduleHandler = $module_handler;
    $this->alterInfo('physical_unit');
    $this->setCacheBackend($cache_backend, 'physical_unit_plugins');
  }

  /**
   * {@inheritdoc}
   */
  protected function getDiscovery() {
    if (!isset($this->discovery)) {
      $this->discovery = new YamlDiscovery('units', $this->moduleHandler->getModuleDirectories());
      $this->discovery = new ContainerDerivativeDiscoveryDecorator($this->discovery);
    }
    return $this->discovery;
  }

}
