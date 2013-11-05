<?php

/**
 * @file
 * Contains \Drupal\comment\Plugin\Block\RecentCommentsBlock.
 */

namespace Drupal\d8_demo\Plugin\Block;

use Drupal\block\BlockBase;
use Drupal\block\Annotation\Block;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a 'Drupal 8 Demo' block.
 *
 * @Block(
 *  id = "d8_demo",
 *  admin_label = @Translation("Drupal 8 Demo"),
 *  module = "d8_demo"
 * )
 */
class d8DemoBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    // return an array of default configurations for the block Config form
    return array();
  }

  /**
   * {@inheritdoc}
   */
  public function access(AccountInterface $account) {
    return $account->hasPermission('access content');
  }

  /**
   * Overrides \Drupal\block\BlockBase::blockForm().
   */
  public function blockForm($form, &$form_state) {
    // Create the Config form for the block
    return $form;
  }

  /**
   * Overrides \Drupal\block\BlockBase::blockSubmit().
   */
  public function blockSubmit($form, &$form_state) {
    // add code to handle the submit
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#theme' => 'd8_demo_content',
      '#items' => array('This block has been created to demo how to create custom blocks in Drupal 8.')
    );
  }

}
