<?php
/**
 * @file
 * Contains \Drupal\d8_demo\Form\d8DemoConfigForm
 */

namespace Drupal\d8_demo\Form;

use Drupal\Core\Form\ConfigFormBase;

/**
 * Provides a demo form
 */
class d8DemoConfigForm extends ConfigFormBase {

  function getFormId() {
    return 'd8_demo_config_form';
  }

  function buildForm(array $form, array &$form_state) {
    $config_default = $this->configFactory->get('d8_demo.settings')->get('d8_demo_config_text');
    $form['d8_demo_textfield_config'] = array(
      '#type' => 'textfield',
      '#title' => t('Demo textfield'),
      '#default_value' => !empty($config_default) ? $config_default : 'Hello Drupal Camp Delhi!!'
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => 'Save Configuration'
    );
    return $form;
  }

  function submitForm(array &$form, array &$form_state) {
    $config = $this->configFactory->get('d8_demo.settings');
    $config->set('d8_demo_config_text', $form_state['values']['d8_demo_textfield_config']);
    $config->save();
    drupal_set_message(t('Configuration saved successfully!'), 'status', FALSE);
  }
}
