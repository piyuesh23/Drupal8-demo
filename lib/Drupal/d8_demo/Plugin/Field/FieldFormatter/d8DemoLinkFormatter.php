<?php

/**
 * @file
 * Contains \Drupal\d8_demo\Plugin\field\formatter\d8DemoLinkFormatter.
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
      $url_parts  = parse_url($url);
      $video_query = $url_parts['query'];
      $video_id = str_replace('v=', '', $video_query);

      $element[$delta] = array(
        '#theme' => 'd8_demo_link',
        '#video_id' => $video_id
      );
    }

    return $element;
  }
}
