<?php
namespace Drupal\module_hero\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class HeroConfigForm extends ConfigFormBase{
    public function getFormId(){
        return "hero_config_form_id";
    }
    const SETTINGS = 'module_hero.settings';
    public function buildForm(array $form, FormStateInterface $form_state){

        // $config = $this->config('module_hero.settings');
        $config = $this->config(static::SETTINGS);
        // echo "<pre>";
        // kint($config);
        // echo "</pre>";


        $form['hero_list_title'] = [
            '#type' => 'textfield',
            '#title' => $this->t("hero list title"),
            '#default_value' => $config->get('hero_list_title'),
        ];

        return parent::buildForm($form, $form_state);
    }

    protected function getEditableConfigNames(){
        return [
            // 'module_hero.settings',
            static::SETTINGS,
        ];
    }

    public function submitFrom(array &$form, FormStateInterface $form_state){
        // $config = $this->configFactory()->getEditable('module_hero.settings');
        $config =  $this->config(static::SETTINGS);

        $config->set('hero_list_title', $form_state->getValue('hero_list_title'))->save();

        parent::submitForm($form, $form_state);
    }
}