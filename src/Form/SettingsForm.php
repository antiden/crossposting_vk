<?php

namespace Drupal\crossposting_vk\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configure Расписание settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  public function __construct(
    ConfigFactoryInterface $config_factory
  ) {
    parent::__construct($config_factory);
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'crossposting_vk.settings'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'crossposting_vk_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('crossposting_vk.settings');

    $form['key'] = array(
      '#type' => 'key_select',
      '#title' => $this->t('Access Token'),
      '#default_value' => $config->get('key'),
    );

    $form['owner_id'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Group ID'),
      '#description' => $this->t('Group ID in VK. You can open any post from wall and copy first value after wall-this is token_post_id.'),
      '#default_value' => $config->get('owner_id'),
    );

    $form['version'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Version'),
      '#rows' => 3,
      '#description' => $this->t('Library version in VK Developer.'),
      '#default_value' => $config->get('version'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('crossposting_vk.settings')
      ->set('key', $form_state->getValue('key'))
      ->set('owner_id', $form_state->getValue('owner_id'))
      ->set('version', $form_state->getValue('version'))
      ->save();
  }
}
