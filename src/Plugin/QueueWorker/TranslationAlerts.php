<?php

namespace Drupal\site_translations\Plugin\QueueWorker;

use Drupal\Core\Queue\QueueWorkerBase;

/**
 * Sends a weekly alert continaing outdated translations.
 *
 * @QueueWorker(
 *   id = "translation_alerts",
 *   title = @Translation("Translation alerts"),
 *   cron = {"time" = 60}
 * )
 */
class TranslationAlerts extends QueueWorkerBase {

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    $this->assembleEmail();
  }

  /**
   * Formats the email.
   */
  private function assembleEmail() {
    // Get outdated translations.
    $nodes = \Drupal::entityTypeManager()
      ->getListBuilder('node')
      ->getStorage()
      ->loadByProperties([
        'content_translation_outdated' => 1,
      ]);
  }

}
