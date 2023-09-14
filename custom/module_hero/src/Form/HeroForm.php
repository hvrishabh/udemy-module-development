<?php

namespace Drupal\module_hero\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class HeroForm extends FormBase{
    public function getFormId(){
        return "hero_form_id";
    }
    public function buildForm(array $form, FormStateInterface $form_state){

        $form['rival_1'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Rival One'),
        ];
        $form['rival_2'] =[
            '#type' => 'textfield',
            '#title' => $this->t('Rival Two')
        ];
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Who will win ?')
        ];



        return $form;

    }

    public function validateForm(array &$form, FormStateInterface $form_state){
        if(empty($form_state->getValue('rival_1'))){
            $form_state->setErrorByName('rival_1',$this->t('please specify rival 1'));
        }
    }


    public function submitForm(array &$form, FormStateInterface $form_state){
        $winner = rand(1, 2);
        \Drupal::messenger()->addMessage('the winner is ' . $form_state->getValue('rival_'.$winner));
    }
}
?>