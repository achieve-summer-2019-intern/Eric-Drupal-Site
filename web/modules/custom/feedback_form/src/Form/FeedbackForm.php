<?php

/**
 * @file
 * Contains \Drupal\feedback_form\Form\FeedbackForm.
 */
namespace Drupal\feedback_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class FeedbackForm extends FormBase {
    public function getFormId() {
        return 'feedback_form_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['feedback_title'] = [
            '#type'        => 'textfield',
            '#title'       => 'Feedback Title',
            '#description' => 'Enter the title of your ticket',
            '#required'    => TRUE,
        ];

        $form['name'] = [
            '#type'        => 'textfield',
            '#title'       => 'Full Name',
            '#description' => 'Enter your full name here',
            '#required'    => TRUE,
        ];

        $form['feedback_description'] = [
            '#type'        => 'textarea',
            '#title'       => 'Feedback Description',
            '#description' => 'Enter your feedback here',
            '#required'    => TRUE,
        ];

        $form['actions'] = [
            '#type'        => 'actions',
        ];

        $form['actions']['submit'] = [
            '#type'        => 'submit',
            '#value'       => 'Submit',
        ];

        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        if (strlen($form_state->getValue('feedback_description')) < 10) {
            $form_state->setErrorByName('feedback_description', 'Description is too short.');
        }
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        // foreach($form_state->getValues() as $key => $value) {
        //     drupal_set_message($key . ': ' . $value);
        // }
        createSubmissionForm($form_state);
    }
}