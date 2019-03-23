<?php
/**
 * Defines the Advertiser Entity.
 *
 * @ingroup advertiser
 *
 * @ContentEntityType(
 *  id = "advertiser",
 *  label = @Translation("Advertiser"),
 *  base_table = "advertiser",
 *  entity_keys = {
 *      "id" = "id",
 *      "uuid" = "uuid",
 *  },
 * )
 */
namespace Drupal\advertiser\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

class Advertiser extends ContentEntityBase implements ContentEntityInterface {

    // Database schema definitions.
    public static function baseFieldDefinitions(EntityTypeInterface $entity_type){
        // Standard fields, used as unique if primary index.
        $fields['id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setDescription(t('The ID of the Advertiser entity.'))
            ->setReadOnly(TRUE);

        // Standard fied, unique outside of the scope of the current project.
        $fields['uuid'] = BaseFieldDefinition::create('uuid')
            ->setLabel(t('UUID'))
            ->setDescription(t('The UUID of the Advertiser entity'))
            ->setReadOnly(TRUE);

        return $fields;
    }

}