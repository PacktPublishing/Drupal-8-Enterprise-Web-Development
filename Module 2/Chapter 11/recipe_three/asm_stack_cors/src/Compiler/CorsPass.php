<?php

/**
 * @file
 * Contains \Drupal\webprofiler\Compiler\StoragePass.
 */

namespace Drupal\asm_stack_cors\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * Class CorsPass
 */
class CorsPass implements CompilerPassInterface {

  /**
   * {@inheritdoc}
   */
  public function process(ContainerBuilder $container) {
    if (FALSE === $container->hasDefinition('asm_stack_cors.cors')) {
      return;
    }

    $cors_config = $container->getParameter('cors');

    if (!$cors_config['enabled']) {
      $container->removeDefinition('asm_stack_cors.cors');
    }
  }

}