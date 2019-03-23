<?php

namespace Drupal\advertiser\Form;

use Drupal\Core\Entity\BundleEntityFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form class for adding and editing Advertiser bundles.
 */
class AdvertiserEntityTypeForm extends BundleEntityFormBase {

    /**
     * {@inheritDoc}
     */
    public function form(array $form, FormStateInterface $form_state){
        $form = parent::form($form, $form_state);

        $entity_type = $this->entity;
        $content_entity_id = $entity_type->getEntityType()->getBundleOf();

        $form['label'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Label'),
            '#maxlength' => 255,
            '#default' => $entity_type->label(),
            '#description' => $this->t('Label for the %content_entity_id% entity type.', ['%content_entity_id%' => $content_entity_id]),
            '#required' => TRUE,
        ];

        $form['id'] = [
            '#type' => 'machine_name',
            '#default_value' => $entity_type->id(),
            '#machine_name' => [
                'exists' => '\Drupal\Advertiser\Entity\AdvertiserTypeEntity::load',
            ],
            '#disabled' => !$entity_type->isNew(),
        ];

        return $this->protectBundleIdElement($form);
    }

    /**
     * {@inheritDoc}
     */
    public function save(array $form, FormStateInterface $form_state){
        $entity_type = $this->entity;
        $status = $entity_type->save();
        $message_params = [
            '%label' => $entity_type->label(),
            '%content_entity_id' => $entity_type->getEntityType()->getBundleOf(),
        ];

        // Provide a message for the user and redirect them back to the collection.
        switch($status){
            case SAVED_NEW:
                drupal_set_message($this->t('Created the %label %content_entity_id entity type.', $message_params));
                break;
            default:
                drupal_set_message($this->t('Saved the %label %content_entity_id', $message_params));
        }

        $form_state->setRedirectUrl($entity_type->toUrl('collection'));
    }
}
