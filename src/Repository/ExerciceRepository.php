<?php

namespace App\Repository;

use App\Entity\Exercice;
use Doctrine\ORM\Query;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class ExerciceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exercice::class);
    }

    public function findExercicesbyPlatform($platform_id)
    {
        {
            $entityManager = $this->getEntityManager();
    
            $query = $entityManager->createQuery("
            SELECT exercice,platform
            FROM App\Entity\Exercice exercice
            INNER JOIN exercice.platform platform
            WHERE exercice.platform = $platform_id 
            ");
    
            return $query->getResult();
        }


    }
}
