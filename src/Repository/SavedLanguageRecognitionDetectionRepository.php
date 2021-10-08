<?php

namespace App\Repository;

use App\Entity\SavedLanguageRecognitionDetection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SavedLanguageRecognitionDetection|null find($id, $lockMode = null, $lockVersion = null)
 * @method SavedLanguageRecognitionDetection|null findOneBy(array $criteria, array $orderBy = null)
 * @method SavedLanguageRecognitionDetection[]    findAll()
 * @method SavedLanguageRecognitionDetection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SavedLanguageRecognitionDetectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SavedLanguageRecognitionDetection::class);
    }

    // /**
    //  * @return SavedLanguageRecognitionDetection[] Returns an array of SavedLanguageRecognitionDetection objects
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
    public function findOneBySomeField($value): ?SavedLanguageRecognitionDetection
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
