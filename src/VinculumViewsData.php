<?php

namespace Drupal\vinculum;
use Drupal\views\EntityViewsData;

class VinculumViewsData extends EntityViewsData {
  public function getViewsData() {
    // Start with the Views information provided by the base class.
    $data = parent::getViewsData();

    // Override a few things...

    // Define a wizard.
    $data['vinculum_field_data']['table']['wizard_id'] = 'vinculum';

    // You could also override labels or put in a custom field
    // or filter handler.

    return $data;
  }
}

