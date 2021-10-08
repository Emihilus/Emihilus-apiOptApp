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

    public function findAllWithDetections()
    {
       return $this->createQueryBuilder('s')
            ->leftJoin('s.detections', 'i')
            ->addSelect('i.filename')
            ->where('i.orderIndicator = 0')
            ->orWhere('i.orderIndicator IS NULL')
            ->getQuery()
            ->getResult()
        ;
    }
}
