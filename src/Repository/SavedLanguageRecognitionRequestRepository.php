<?php

namespace App\Repository;

use App\Entity\SavedLanguageRecognitionRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SavedLanguageRecognitionRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method SavedLanguageRecognitionRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method SavedLanguageRecognitionRequest[]    findAll()
 * @method SavedLanguageRecognitionRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SavedLanguageRecognitionRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SavedLanguageRecognitionRequest::class);
    }

    // /**
    //  * @return SavedLanguageRecognitionRequest[] Returns an array of SavedLanguageRecognitionRequest objects
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
    public function findOneBySomeField($value): ?SavedLanguageRecognitionRequest
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
