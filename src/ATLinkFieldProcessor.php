<?php

namespace Drupal\site_translations;

use Drupal\tmgmt_content\LinkFieldProcessor;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Custom file processor for the link field.
 */
class ATLinkFieldProcessor extends LinkFieldProcessor {

  /**
   * {@inheritdoc}
   */
  public function extractTranslatableData(FieldItemListInterface $field) {
    $data = parent::extractTranslatableData($field);
    // \Drupal::logger('site_translations')->info('Using ATLinkFieldProcessor.');
    return $data;
  }

}
