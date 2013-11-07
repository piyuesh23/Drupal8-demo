<?php
/**
 * @file
 * Contains \Drupal\d8_demo\Form\d8DemoForm
 */

namespace Drupal\d8_demo\Form;

use Drupal\Core\Form\FormInterface;

/**
 * Provides a demo form
 */
class d8DemoForm implements FormInterface {

  /**
   * Implements Drupal\core\Form\FormInterface::getFormId().
   */
  function getFormId() {
    return 'd8_demo_config_form';
  }

  /**
   * Implements Drupal\core\Form\FormInterface::buildForm().
   */
  function buildForm(array $form, array &$form_state) {
    $form['d8_demo_textfield'] = array(
      '#type' => 'textfield',
      '#title' => t('Simple Form Demo textfield'),
      '#default_value' => 'Hello DrupalCamp Delhi!',
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => 'submit'
    );
    return $form;
  }

  /**
   * Implements Drupal\core\Form\FormInterface::validateForm().
   */
  function validateForm(array &$form, array &$form_state) {
    if (empty($form_state['values']['d8_demo_textfield'])) {
      form_set_error('', 'Demo textfield is empty!');
    }
  }

  /**
   * Implements Drupal\core\Form\FormInterface::submitForm()
   */
  function submitForm(array &$form, array &$form_state) {
    drupal_set_message('Demo textfield value is ' . $form_state['values']['d8_demo_textfield']);
  }
}
