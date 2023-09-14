<?php

namespace Drupal\module_hero\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Our custom ajax form
 */

class AjaxHeroForm extends FormBase
{
    /**
     * {@inheritDoc}
     */

    public function getFormId()
    {
        return "module_hero_ajax_form_id";
    }
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['message'] = [
            '#type' => 'markup',
            '#markup' => '<div class="result_message"></div>',
        ];
        $form['rival_1'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Rival One'),
        ];
        $form['rival_2'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Rival Two'),
        ];

        $form['submit'] = [
            '#type' => 'button',
            '#value' => $this->t('who will win ?'),
            '#ajax' => [
                'callback' => '::setMessage',
            ],
        ];
        return $form;
    }

    public function setMessage(array &$form, FormStateInterface $form_state)
    {
        $winner = rand(1, 2);

        $response = new AjaxResponse();
        $response->addCommand(
            new HtmlCommand(
                '.result_message',
                'THe winner is ' . $form_state->getValue('rival_' . $winner)
            )
        );
        return $response;
    }
    public function submitForm(array &$form, FormStateInterface $form_state)
    {

    }
}
