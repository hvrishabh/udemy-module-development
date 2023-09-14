<?php

namespace Drupal\block_hero\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "Block_hero_id",
 *   admin_label = @Translation("Hero block Basics"),
 *   category = "Examples"
 * )
 */

class HeroBlock extends BlockBase
{



    public function build()
    {
        return [
            '#type' => 'markup',
            '#markup' => $this->t('The output of our superhero Block'),
        ];
    }
}
