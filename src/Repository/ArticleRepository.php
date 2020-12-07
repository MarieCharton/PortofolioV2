<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }


    public function findArticlesbyCategory($hashtag_id)
    {
        {
            $entityManager = $this->getEntityManager();
    
            $query = $entityManager->createQuery("
            SELECT article,hashtag
            FROM App\Entity\Article article
            INNER JOIN article.hashtags hashtag
            WHERE hashtag.id = $hashtag_id 
            ");
    
            return $query->getResult();
        }


    }
}
