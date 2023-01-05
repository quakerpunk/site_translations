<?php

namespace Drupal\site_translations\Controller;

use Drupal\node\NodeInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Symfony\Component\HttpFoundation\Request;

/**
 * Methods for handling additional translation tasks.
 */
class TranslationController extends ControllerBase {

  /**
   * Excludes a node from a translation.
   *
   * @param Drupal\node\NodeInterface $node
   *   The node being excluded.
   */
  public function exclude(NodeInterface $node) {
    // From a machine name standpoint, this field is named strangely.
    // Leaving off the "field_" prefix is fine.
    if ($node->hasField('exclude_from_translations')) {
      $node->exclude_from_translations->value = 1;
      $node->save();
    }

    // Set status message.
    $status_msg = new TranslatableMarkup('%title has been excluded from translation.', ['%title' => $node->getTitle()]);
    \Drupal::messenger()->addStatus($status_msg);

    // Find your way back...
    $request = Request::createFromGlobals();
    $uri = parse_url($request->headers->get('referer'), PHP_URL_PATH);
    $urlObject = \Drupal::service('path.validator')->getUrlIfValid($uri);
    $route = $urlObject->getRouteName();
    return $this->redirect($route);
  }

}
