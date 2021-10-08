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

    public function findAllWithRecognitions()
    {
       return $this->createQueryBuilder('s')
            ->leftJoin('s.recognitions', 'r')
            ->addSelect('s.recognition')
            ->getQuery()
            ->getResult()
        ;
    }
}
