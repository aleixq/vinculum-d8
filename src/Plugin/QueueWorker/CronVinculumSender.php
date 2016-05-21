<?php 
namespace Drupal\vinculum\Plugin\QueueWorker;

/**
 * A Vinculum Sender that fire the events of sending refbacks on  CRON run.
 *
 * @QueueWorker(
 *   id = "cron_vinculum_sender",
 *   title = @Translation("Cron Vinculum Sender"),
 *   cron = {"time" = 20}
 * )
 */
class CronVinculumSender extends VinculumSender {}

