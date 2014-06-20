<?php
/**
 * @file
 * Contains \Drupal\d8_demo\Form\d8DemoForm
 */

namespace Drupal\d8_demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Provides a demo form
 */
class d8SessionAddForm extends FormBase implements ContainerInjectionInterface {

  protected $database;

  public function __construct(Connection $database) {
    $this->database = $database;
  }

  /**
   * Implements Drupal\core\Form\FormInterface::getFormId().
   */
  function getFormId() {
    return 'd8_session_add_form';
  }

  /**
   * Implements Drupal\core\Form\FormInterface::buildForm().
   */
  function buildForm(array $form, array &$form_state) {
    $form['uid'] = array(
      '#type' => 'textfield',
      '#title' => t('User Id'),
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
    if (empty($form_state['values']['uid'])) {
      form_set_error('error', $this->t('User id should not be left empty!'));
    }
  }

  /**
   * Implements Drupal\core\Form\FormInterface::submitForm()
   */
  function submitForm(array &$form, array &$form_state) {
    $request = \Drupal::request();

    $uid = $form_state['values']['uid'];

    $result = $this->database->insert('sessions')
      ->fields(array(
        'uid' => $uid,
        'sid' => md5(time()),
        'hostname' => $request->getClientIp(),
        'timestamp' => time()
      ))->execute();
    $form_state['redirect'] = 'admin/config/development/d8-session-content';
    drupal_set_message(t('Session added successfully'), 'status', FALSE);
  }

  public static function create(ContainerInterface $container) {
    return new static($container->get('database'));
  }
}
