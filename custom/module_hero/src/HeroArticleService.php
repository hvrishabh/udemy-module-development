<?php
namespace Drupal\module_hero;

use Drupal\Core\Config\Entity\Query\QueryFactory;
use Drupal\Core\Entity\EntityTypeManager;

/**
 * Our hero article service class.
 */
class HeroArticleService
{

    private $entityQuery;
    private $entityManager;

    public function __construct(QueryFactory $entityQuery, EntityTypeManager $entityManager)
    {
        $this->entityQuery = $entityQuery;
        $this->entityManager = $entityManager;
    }
    /**
     * Summary of gerHeroArticles
     */
    public function gerHeroArticles()
    {
        $articles = ['Hulk is gree', 'Flash is red'];

        // kint($this->entityQuery->get('node')->condition('type','article')->execute());
        kint($this->entityQuery);
        kint($this->entityManager);
        return $articles;
    }
}
