<?php

namespace App\Repository;

use App\Entity\SavedIMGWMeasurement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SavedIMGWMeasurement|null find($id, $lockMode = null, $lockVersion = null)
 * @method SavedIMGWMeasurement|null findOneBy(array $criteria, array $orderBy = null)
 * @method SavedIMGWMeasurement[]    findAll()
 * @method SavedIMGWMeasurement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SavedIMGWMeasurementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SavedIMGWMeasurement::class);
    }

    // /**
    //  * @return SavedIMGWMeasurement[] Returns an array of SavedIMGWMeasurement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SavedIMGWMeasurement
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
