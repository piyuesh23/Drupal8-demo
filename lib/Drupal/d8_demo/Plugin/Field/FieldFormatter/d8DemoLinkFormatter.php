<?php

/**
 * @file
 * Contains \Drupal\d8_demo\Plugin\field\formatter\YouTubeLinkFormatter.
 */

namespace Drupal\d8_demo\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\link\Plugin\Field\FieldFormatter\LinkFormatter;
/**
 * Plugin implementation of the 'd8_demo_link' formatter.
 *
 * @FieldFormatter(
 *   id = "d8_link",
 *   label = @Translation("Drupal 8 demo field Formatter"),
 *   field_types = {
 *     "link"
 *   }
 * )
 */
class d8DemoLinkFormatter extends FormatterBase {
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items) {
    foreach ($items as $delta => $item) {
      $url = $item->url;
      $element[$delta] = array(
        '#theme' => 'd8_demo_link',
        'url' => $url
      );
    }

    return $element;
  }
}
