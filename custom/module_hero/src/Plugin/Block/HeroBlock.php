<?php

namespace Drupal\module_hero\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "module_hero_id_block",
 *   admin_label = @Translation("Module hero block"),
 *   category = "module hero category"
 * )
 */

class HeroBlock extends BlockBase
{

    public function build()
    {

        // $heroService = Drupal::service('module_hero.hero_articles');
        // kint($heroService);
        // die();
        $heros = [
            ["hero_name" => "hulk", "real_name" => "real hulk"],
            ["hero_name" => "thor", "real_name" => "real thor"],
            ["hero_name" => "iron man", "real_name" => "real iron man"],
            ["hero_name" => "caotain america", "real_name" => "real caotain america"],
            ["hero_name" => "xman", "real_name" => "real xman"],
            ["hero_name" => "wolverine", "real_name" => "real wolverine"],
            1,
        ];

        $table = [
            '#type' => 'table',
            '#header' => [
                $this->t('Hero Name'),
                $this->t('Real Name'),
            ],
        ];
        foreach ($heros as $hero) {
            $table[] = [
                'hero_name' => [
                    '#type' => 'markup',
                    '#markup' => $hero['hero_name'],
                ],
                'real_name' => [
                    '#type' => 'markup',
                    '#markup' => $hero['real_name'],
                ],
            ];

        }

        return $table;
    }
}
