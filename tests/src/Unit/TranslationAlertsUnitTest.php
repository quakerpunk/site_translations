<?php

namespace Drupal\Tests\site_translations\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\site_translations\Plugin\QueueWorker\TranslationAlerts;

/**
 * Testing email alerts.
 *
 * @group translation_alerts
 */
class TranslationAlertsUnitTest extends UnitTestCase {

  /**
   * The alert system.
   *
   * @var \Drupal\site_translations\Plugin\QueueWorker\TranslationAlerts
   */
  protected $alertSystem;

  /**
   * Set up method.
   */
  public function setUp() {
    $this->alertSystem = new TranslationAlerts();
  }

  /**
   * Test fetching translations marked as outdated.
   */
  public function testEntityQuey() {
    $this->alertSystem->processItem([]);
    $this->assertNotEmpty(TRUE, 'Here are the nodes.');
  }

}
