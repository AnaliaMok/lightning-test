<?php
/**
 * Advertiser Type
 *
 * @ConfigEntityType(
 *   id = "advertiser_type",
 *   label = @Translation("Advertiser Type"),
 *   bundle_of = "advertiser",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   config_prefix = "advertiser_type",
 *   config_export = {
 *     "id",
 *     "label",
 *   },
 *   handlers = {
 *     "form" = {
 *       "default" = "Drupal\advertiser\Form\AdvertiserTypeEntityForm",
 *       "add" = "Drupal\advertiser\Form\AdvertiserTypeEntityForm",
 *       "edit" = "Drupal\advertiser\Form\AdvertiserTypeEntityForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   admin_permission = "administer site configuration",
 *   links = {
 *     "canonical" = "/admin/structure/advertiser_type/{advertiser_type}",
 *     "add-form" = "/admin/structure/advertiser_type/add",
 *     "edit-form" = "/admin/structure/advertiser_type/{advertiser_type}/edit",
 *     "delete-form" = "/admin/structure/advertiser_type/{advertiser_type}/delete",
 *     "collection" = "/admin/structure/advertiser_type",
 *   }
 * )
 */

namespace Drupal\advertiser\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

class AdvertiserType extends ConfigEntityBundleBase {}