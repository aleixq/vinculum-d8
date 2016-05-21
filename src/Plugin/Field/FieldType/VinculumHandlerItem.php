<?php

namespace Drupal\vinculum\Plugin\Field\FieldType;

use Drupal\Component\Utility\Random;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'vinculum_handlers' field type.
 *
 * @FieldType(
 *   id = "vinculum_handlers",
 *   label = @Translation("Vinculum handlers"),
 *   description = @Translation("This field stores vinculum enabled handlers"),
 *   default_widget = "vinculum_default_widget",
 *   default_formatter = "vinculum_formatter"
 * )
 */
class VinculumHandlerItem extends FieldItemBase {
  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    // Prevent early t() calls by using the TranslatableMarkup.
    $properties['vinculum_receive'] = DataDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('Receive vinculums'));
    $properties['vinculum_send'] = DataDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('Send vinculums'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = array(
      'columns' => array(
        'vinculum_receive' => array(
          'type' => 'int',
          'size' => 'tiny',
        ),
        'vinculum_send' => array(
          'type' => 'int',
          'size' => 'tiny',
        ),
      ),
    );

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('vinculum_send')->getValue();
    return $value === NULL || $value === '';
  }

}
