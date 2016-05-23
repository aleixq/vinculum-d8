<?php

namespace Drupal\linkback\Form;

use Drupal\Core\Entity\ContentEntityDeleteForm;
use Drupal\Core\Url;

/**
 * Provides a form for deleting a linkback.
 */
class LinkbackReceivedDeleteForm extends ContentEntityDeleteForm {

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('linkback.queue');
  }

  /**
   * {@inheritdoc}
   */
  protected function getRedirectUrl() {
    return $this->getCancelUrl();
  }

  /**
   * {@inheritdoc}
   */
  protected function getDeletionMessage() {
    return $this->t('The linkback %label has been deleted.', array(
      '%label' => $this->entity->label(),
    ));
  }

}
