<?php

namespace Drupal\feedback_form\Controller;

use Drupal\Core\Controller\ControllerBase;

class FeedbackController extends ControllerBase {
    public function formContent($form_state) {
        createSubmissionForm($form_state);
        // return array(
        //     '#type'   => 'markup',
        //     '#markup' => 'Test',
        // );
    }
}