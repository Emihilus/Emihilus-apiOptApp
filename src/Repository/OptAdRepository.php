<?php

namespace App\Repository;

use App\Entity\OptAd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OptAd|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptAd|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptAd[]    findAll()
 * @method OptAd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptAdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OptAd::class);
    }

    // /**
    //  * @return OptAd[] Returns an array of OptAd objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OptAd
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
