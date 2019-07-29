<?php

namespace Drupal\intern\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class FirstForm extends FormBase
{
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['first_name'] = [
            '#type'        => 'textfield',
            '#title'       => 'First Name',
            '#description' => 'Please enter your first name',
            '#required'    => TRUE,
        ];

        $form['last_name'] = [
            '#type'        => 'textfield',
            '#title'       => 'Last Name',
            '#description' => 'Please enter your last name',
            '#required'    => TRUE,
        ];

        $form['sports_dropdown'] = [
            '#type'        => 'select',
            '#title'       => 'Favorite Sport',
            '#description' => 'Select your favorite sport',
            '#options'     => [
                '1' => $this->t('Basketball'),
                '2' => $this->t('Baseball'),
                '3' => $this->t('Soccer'),
                '4' => $this->t('Football'),
                '5' => $this->t('Ice Hockey'),
            ]
            
        ];

        $form['email'] = [
            '#type'        => 'email',
            '#title'       => 'Email Address',
            '#description' => 'Enter your email address',
            '#required'    => TRUE,
        ];

        $form['phone_number'] = [
            '#type'        => 'tel',
            '#title'       => 'Phone Number',
            '#description' => 'Enter your phone number',
            '#pattern'     => '[^\\d]*',
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

    // Maybe get Neil to explain this once more
    public function getFormId() {
        return 'intern_first_form';
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        $title = $form_state->getValue('first_name');
        if(empty($first_name)) {
            $form_state->setErrorByName('first_name', 'You must enter a first name.');
        }
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        $title = $form_state->getValue('title');

        drupal_set_message('You submitted a form with title: ' . $title);
    }
}