<?php

namespace App\Repository;

use App\Entity\EasyAdminConfigHelper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EasyAdminConfigHelper>
 *
 * @method EasyAdminConfigHelper|null find($id, $lockMode = null, $lockVersion = null)
 * @method EasyAdminConfigHelper|null findOneBy(array $criteria, array $orderBy = null)
 * @method EasyAdminConfigHelper[]    findAll()
 * @method EasyAdminConfigHelper[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EasyAdminConfigHelperRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EasyAdminConfigHelper::class);
    }

//    /**
//     * @return EasyAdminConfigHelper[] Returns an array of EasyAdminConfigHelper objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EasyAdminConfigHelper
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
