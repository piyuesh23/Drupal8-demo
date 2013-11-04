<?php

/**
 * @file
 * Contains \Drupal\user\Controller\d8DemoController.
 */

namespace Drupal\d8_demo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller routines for user routes.
 */
class d8DemoController extends ControllerBase {
  /**
   * Simple content Controller
   */
  public function renderContent() {
    $items = array('item 1', 'item 2', 'item 3', 'item 4');
    $variables = array(
      '#theme' => 'd8_demo_content',
      '#items' => $items,
      '#attributes' => array('class' => array('item-list')),
    );

    return drupal_render($variables);
  }

  /**
   * Dynamic menu controller
   */
  public function renderArgumentContent($arg1, $arg2) {
    $items = array('Arg1 => ' . $arg1, 'Arg2 => ' . $arg2);
    $variables = array(
      '#theme' => 'd8_demo_content',
      '#items' => $items,
      '#attributes' => array('class' => array('item-list')),
    );
    return drupal_render($variables);
  }
}
