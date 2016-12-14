<?php

/**
 * @file
 * Contains \Drupal\drupalform\Form\ExampleForm.
 **/

namespace Drupal\drupalform\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ExampleForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
      return ['drupalform.company'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drupalform_example_form';
  }

  /**
   * {@inheritdoc}
   */
public function buildForm(array $form, FormStateInterface $form_state) {
  $form['company_name'] = array(
    '#type' => 'textfield',
    '#title' => $this->t('Company name'),
    '#default_value' => $this->config('drupalform.company')->get('company_name'),
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => $this->t('Save'),
  );

  return $form;
}

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form,  FormStateInterface $form_state) {
    // Validation covered in later recipe, required to satisfy interface
  }


  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form,  FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $this->config('drupalform.company')
      ->set('name', $form_state->getValue('company_name'));
  }
}
