<?php

namespace Drupal\linkback\Event;

use Symfony\Component\EventDispatcher\Event;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Url;

/**
 * Event that is fired when a linkback needs to be send (rules event).
 *
 * @see rules_linkback_send()
 */
class LinkbackSendRulesEvent extends Event {

  const EVENT_NAME = 'rules_linkback_send';

  /**
   * The source content.
   *
   * @vau Drupal\Core\Entity\ContentEntityInterface;
   */
  protected $source;

  /**
   * The target url.
   *
   * @var string
   */
  protected $targetUrl;

  /**
   * Getter for the sourceUrl.
   *
   * @return ContentEntityInterface
   */
  public function getSource() {
    return $this->source;
  }

  /**
   * Setter for the source.
   *
   * @param $source
   */
  public function setSource($source) {
    $this->source = $source;
  }

  /**
   * Getter for the targetUrl.
   *
   * @return Url
   */
  public function getTargetUrl() {
    return $this->targetUrl;
  }

  /**
   * Setter for the targetUrl.
   *
   * @param $url
   */
  public function setTargetUrl($url) {
    $this->targetUrl = $url;
  }

  /**
   * Constructs the object.
   *
   * @param \Drupal\Core\Entity\ContentEntityInterface
   *   The source content.
   * @param string
   *   The target url.
   */
  public function __construct(ContentEntityInterface $source, string $target_url) {
    $this->source = $source;
    $this->targetUrl = $target_url;
  }

}
