<?php 
namespace Drupal\vinculum\Event;

use Symfony\Component\EventDispatcher\Event;
use Drupal\Core\Url;
/**
 * Event that is fired when a vinculum needs to be send.
 *
 * @see vinculum_send()
 */
class VinculumSendEvent extends Event {

  const EVENT_NAME = 'vinculum_send';

  /**
   * The source url.
   *
   * @var Url
   */
  protected $sourceUrl;

  /**
   * The target url.
   *
   * @var Url
   */
  protected $targetUrl;

  /**
   * Getter for the sourceUrl.
   *
   * @return Url
   */
  public function getSourceUrl() {
    return $this->sourceUrl;
  }

  /**
   * Setter for the sourceUrl.
   *
   * @param $url
   */
  public function setSourceUrl($url) {
    $this->sourceUrl = $url;
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
   * @param \Drupal\user\UserInterface $account
   *   The account of the user logged in.
   */
  public function __construct(Url $source_url, Url $target_url) {
    $this->sourceUrl = $source_url;
    $this->targetUrl = $target_url;
  }

}
