<?php

namespace Drupal\site_translations;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\tmgmt_content\PathFieldProcessor;

/**
 * Custom file processor for the path field.
 */
class ATPathFieldProcessor extends PathFieldProcessor {

  /**
   * {@inheritdoc}
   */
  public function extractTranslatableData(FieldItemListInterface $field) {
    $data = parent::extractTranslatableData($field);
    // \Drupal::logger('site_translations')->info('Using ATPathFieldProcessor.');
    return $data;
  }

}
