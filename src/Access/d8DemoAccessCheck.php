<?php

/**
 * @file
 * Contains \Drupal\d8_demo\Access\d8DemoAccessCheck.
 */

namespace Drupal\d8_demo\Access;

use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Determines access to routes based on login status of current user.
 */
class d8DemoAccessCheck implements AccessInterface {

  /**
   * {@inheritdoc}
   */
  public function access(Route $route, Request $request, AccountInterface $account) {
    return ($GLOBALS['user']->id() == 1) ? static::ALLOW : static::DENY;
  }
}
