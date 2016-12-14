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
  $form['phone'] = array(
    '#type' => 'tel',
    '#title' => t('Phone'),
  );
  $form['email'] = array(
    '#type' => 'email',
    '#title' => t('Email'),
  );
  $form['integer'] = array(
    '#type' => 'number',
    '#title' => t('Some integer'),
    // The increment or decrement amount
    '#step' => 1,
    // Miminum allowed value
    '#min' => 0,
    // Maxmimum allowed value
    '#max' => 100,
  );
  $form['date'] = array(
    '#type' => 'date',
    '#title' => t('Date'),
    '#date_date_format' => 'Y-m-d',
  );
  $form['website'] = array(
    '#type' => 'url',
    '#title' => t('Website'),
  );
  $form['search'] = array(
    '#type' => 'search',
    '#title' => t('Search'),
    '#autocomplete_route_name' => FALSE,
  );
  $form['range'] = array(
    '#type' => 'range',
    '#title' => t('Range'),
    '#min' => 0,
    '#max' => 100,
    '#step' => 1,
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
    // Validation covered in later recipe, required to satisfy interface
  }
}
