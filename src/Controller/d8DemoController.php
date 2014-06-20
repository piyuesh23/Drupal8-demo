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
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller routines for user routes.
 */
class d8DemoController extends ControllerBase implements ContainerInjectionInterface {

  protected $database;

  public function __construct(Connection $database) {
    $this->database = $database;
  }
  /**
   * Simple content Controller
   */
  public function renderContent() {
    $items = array('arg1' => 'Demo Content item 1', 'arg2' => 'Demo Content item 2');
    $variables = array(
      '#theme' => 'd8_demo_content',
      '#items' => $items,
      '#empty' => $this->t('No sessions available')
    );

    return drupal_render($variables);
  }

  /**
   * Simple content Controller
   */
  public function renderDbContent() {
    $sessions = $this->database->select('sessions', 's')
      ->fields('s')
      ->execute()
      ->fetchAll();

    $header = array($this->t('Uid'), $this->t('session id'), $this->t('hostname'), $this->t('timestamp'));
    foreach ($sessions as $session) {
      $rows[] = array($session->uid, $session->sid, $session->hostname, $session->timestamp);
    }
    $variables = array(
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#empty' => $this->t('No sessions available')
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
      '#theme' => 'd8_demo_content',
      '#items' => $items,
      '#attributes' => array('class' => array('item-list')),
    );
    return drupal_render($variables);
  }

  public static function create(ContainerInterface $container) {
    return new static($container->get('database'));
  }
}
