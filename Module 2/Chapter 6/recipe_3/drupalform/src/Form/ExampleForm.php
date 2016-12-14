<?php

/**
 * @file
 * Contains \Drupal\drupalform\Form\ExampleForm.
 **/

namespace Drupal\drupalform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ExampleForm extends FormBase {

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
    if (!$form_state->isValueEmpty('company_name')) {
      if (strlen($form_state->getValue('company_name')) <= 5) {
        $form_state->setErrorByName('company_name', t('Company name is less than 5 characters'));
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form,  FormStateInterface $form_state) {
    // Validation covered in later recipe, required to satisfy interface
  }
}
