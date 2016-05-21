<?php 
namespace Drupal\vinculum\Plugin\QueueWorker;

/**
 * A Vinculum Sender that fire the events of sending refbacks via a manual action triggered by an admin.
 *
 * @QueueWorker(
 *   id = "manual_vinculum_sender",
 *   title = @Translation("Manual Vinculum Sender"),
 * )
 */
class ManualVinculumSender extends VinculumSender {}

