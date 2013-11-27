<?php

/**
 * @file
 * Contains \Drupal\d8_demo\Access\d8DemoAccessCheck.
 */

namespace Drupal\d8_demo\Access;

use Drupal\Core\Access\AccessCheckInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Session\AccountInterface;

/**
 * Determines access to routes based on login status of current user.
 */
class d8DemoAccessCheck implements AccessCheckInterface {

  /**
   * {@inheritdoc}
   */
  public function applies(Route $route) {
    return array('_access_check_admin');
  }

  /**
   * {@inheritdoc}
   */
  public function access(Route $route, Request $request, AccountInterface $account) {
    return in_array('administrator', $GLOBALS['user']->getRoles()) ? static::ALLOW : static::DENY;
  }
}
