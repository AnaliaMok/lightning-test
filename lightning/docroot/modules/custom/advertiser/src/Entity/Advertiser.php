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
 *  handlers = {
 *      "form" = {
 *          "default" = "Drupal\Core\Entity\ContentEntityForm",
 *          "add" = "Drupal\Core\Entity\ContentEntityForm",
 *          "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *          "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *      },
 *      "route_provider" = {
 *          "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *      }
 *  },
 *  links = {
 *      "canonical" = "/advertiser/{advertiser}",
 *      "add-page" = "/advertiser/add",
 *      "add-form" = "/advertiser/add/{advertiser_type}",
 *      "edit-form" = "/advertiser/{advertiser}/edit",
 *      "delete-form" = "/advertiser/{advertiser}/delete",
 *  },
 *  admin_permission = "administer site configuration",
 *  bundle_entity_type = "advertiser_type",
 *  fieldable = TRUE,
 *  field_ui_base_route = "entity.advertiser_type.edit_form",
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