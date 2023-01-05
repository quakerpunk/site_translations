<?php

namespace Drupal\site_translations\Plugin\Action;

use Drupal\Core\Action\ActionBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Excludes a node from translation.
 *
 * This makes use of the "Exclude from translation" checkbox attached to
 * Web Content Pages.
 *
 * @Action(
 *   id = "exclude_from_translation",
 *   label = @Translation("Execute exclude from translation"),
 *   type = "node"
 * )
 */
class ExcludeFromTranslation extends ActionBase {

  /**
   * {@inheritdoc}
   */
  public function execute($entity = NULL) {
    // From a machine name standpoint, this field is named strangely.
    // Leaving off the "field_" prefix is fine.
    if ($entity->hasField('exclude_from_translations')) {
      $entity->exclude_from_translations->value = 1;
      $entity->save();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function access($object, AccountInterface $account = NULL, $return_as_object = FALSE) {
    /** @var \Drupal\node\NodeInterface $object */
    $result = $object->access('update', $account, TRUE)
      ->andIf($object->exclude_from_translations->access('edit', $account, TRUE));

    return $return_as_object ? $result : $result->isAllowed();
  }

}
