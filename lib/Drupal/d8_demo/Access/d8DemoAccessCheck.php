<?php

/**
 * @file
 * Contains \Drupal\d8_demo\Access\d8DemoAccessCheck.
 */

namespace Drupal\d8_demo\Access;

use Drupal\Core\Access\StaticAccessCheckInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Determines access to routes based on login status of current user.
 */
class d8DemoAccessCheck implements StaticAccessCheckInterface {

  /**
   * {@inheritdoc}
   */
  public function appliesTo() {
    return array('_access_dynamic_d8_demo');
  }

  /**
   * {@inheritdoc}
   */
  public function access(Route $route, Request $request) {
    error_log(print_r($GLOBALS, TRUE));
    return $GLOBALS['user']->isAuthenticated() ? static::ALLOW : static::DENY;
  }
}
