<?php

namespace Drupal\module_hero\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ExampleForm extends FormBase
{
    public function getFormId()
    {
        return "example_form_id";
    }
    public function buildForm(array $form, FormStateInterface $form_state)
    {

        $form['text'] = array(
            '#type' => 'textarea',
            '#title' => $this->t('Text'),
        );
        $form['title'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Subject'),
            // '#default_value' => $node->title,
            '#size' => 60,
            '#maxlength' => 128,
            '#pattern' => 'some-prefix-[a-z]+',
            '#required' => true,
        );

        $form['favorites']['colors'] = array(
            '#type' => 'checkboxes',
            '#options' => array(
                'blue' => $this->t('Blue'),
                'red' => $this->t('Red')),
            '#title' => $this->t('Which colors do you like?'),

        );
        $form['favorites']['colors']['blue']['#description'] = $this->t('The color of the sky.');

        $form['settings']['active'] = array(
            '#type' => 'radios',
            '#title' => $this->t('Poll status'),
            '#default_value' => 1,
            '#options' => array(
                0 => $this->t('Closed'),
                1 => $this->t('Active'),
            ),
        );



        $form['settings']['active'][0]['#description'] = $this
            ->t('Description for the Closed option.');

        $form['example_select'] = [
            '#type' => 'select',
            '#title' => $this->t('Select element'),
            '#options' => [
                '1' => $this->t('One'),
                '2' => [
                    '2.1' => $this->t('Two point one'),
                    '2.2' => $this->t('Two point two'),
                ],
                '3' => $this->t('Three'),
            ],
        ];

        $form['expiration'] = [
            '#type' => 'date',
            '#title' => $this->t('Content expiration'),
            '#default_value' => '2020-02-05',
          ];

        return $form;

    }
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $winner = rand(1, 2);
        \Drupal::messenger()->addMessage('the winner is ' . $form_state->getValue('rival_' . $winner));
    }
}
