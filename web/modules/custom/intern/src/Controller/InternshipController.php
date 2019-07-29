<?php

// Controller for intern module

// Don't need to put the src folder b/c it knows all controllers have to be in src folder
namespace Drupal\intern\Controller;

use Drupal\Core\Controller\ControllerBase;

class InternshipController extends ControllerBase
{
    public function content() {
        return array(
            '#type'   => 'markup',
            '#markup' => '<div>Hello class of Summer 2019</div>',
        );
    }

    public function dynamicContent($count) {
        createNode($count);
        return array(
            '#type'   => 'markup',
            '#markup' => '<div>Hello class of Summer ' . $count .'</div>',
        );
    }
}
