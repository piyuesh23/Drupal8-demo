<?php
/**
 * @file
 * Contains \Drupal\d8_demo\Form\d8DemoForm
 */

namespace Drupal\d8_demo\Form;

use Drupal\Core\Form\FormBase;

/**
 * Provides a demo form
 */
class d8DemoForm extends FormBase {

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
      '#default_value' => 'Hello DrupalCamp Mumbai!',
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
      $this->setFormError('', $form_state, $this->t('Demo textfield is empty!'));
    }
  }

  /**
   * Implements Drupal\core\Form\FormInterface::submitForm()
   */
  function submitForm(array &$form, array &$form_state) {
    drupal_set_message('Demo textfield value is ' . $form_state['values']['d8_demo_textfield']);
  }
}
