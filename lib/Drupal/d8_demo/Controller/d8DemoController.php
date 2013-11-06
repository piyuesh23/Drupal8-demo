<?php

/**
 * @file
 * Contains \Drupal\user\Controller\d8DemoController.
 */

namespace Drupal\d8_demo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;
use Drupal\node\NodeInterface;
use Drupal\Component\Utility\String;
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
  public function renderArgumentContent(UserInterface $user, NodeInterface $node) {
    $items = array(
      'Arg1' => 'User: ' . $user->get('name')->value . '|' . $user->get('mail')->value,
      'Arg2' => 'Node: ' . $node->get('title')->value . '|' . String::checkPlain($this->t($node->get('body')->value))
    );

    $variables = array(
      '#theme' => 'item_list',
      '#items' => $items,
      '#attributes' => array('class' => array('item-list')),
    );
    return drupal_render($variables);
  }
}
