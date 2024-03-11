<?php

namespace App\Repository;

use App\Entity\SaveUploadedFileService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SaveUploadedFileService>
 *
 * @method SaveUploadedFileService|null find($id, $lockMode = null, $lockVersion = null)
 * @method SaveUploadedFileService|null findOneBy(array $criteria, array $orderBy = null)
 * @method SaveUploadedFileService[]    findAll()
 * @method SaveUploadedFileService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SaveUploadedFileServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SaveUploadedFileService::class);
    }

    //    /**
    //     * @return SaveUploadedFileService[] Returns an array of SaveUploadedFileService objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SaveUploadedFileService
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
