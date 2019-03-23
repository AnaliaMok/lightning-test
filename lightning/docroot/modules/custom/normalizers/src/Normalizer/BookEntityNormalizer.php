<?php

namespace Drupal\normalizers\Normalizer;

use Drupal\serialization\Normalizer\NormalizerBase;
use Drupal\serialization\Normalizer\ContentEntityNormalizer;
use Drupal\books\Entity\BookEntity;

class BookEntityNormalizer extends ContentEntityNormalizer {

    /**
     * Class that this normalizer supports.
     *
     * @var string
     */
    protected $supportedInterfaceOrClass = BookEntity::class;

    /**
     * {@inheritDoc}
     */
    public function normalize($entity, $format = NULL, array $context = array()){

        $attributes = parent::normalize($entity, $format, $context);
        $base_url = \Drupal::request()->getSchemeAndHttpHost();

        $value = array(
          'id' => $entity->id(),
          'langcode' => $attributes['langcode'][0]['value'],
          'author' => $attributes['author'][0]['value'],
          'price' => (float) $attributes['price'][0]['value'],
          'cover_img_url' => $base_url . $attributes['field_cover_image'][0]['url'],
        );

        return $value;
    }

}