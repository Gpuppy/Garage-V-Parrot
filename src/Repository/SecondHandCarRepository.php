<?php

namespace App\Repository;

use App\Entity\SecondHandCar;
use App\Model\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SecondHandCar>
 *
 * @method SecondHandCar|null find($id, $lockMode = null, $lockVersion = null)
 * @method SecondHandCar|null findOneBy(array $criteria, array $orderBy = null)
 * @method SecondHandCar[]    findAll()
 * @method SecondHandCar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecondHandCarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecondHandCar::class);
    }

//    /**
//     * @return SecondHandCar[] Returns an array of SecondHandCar objects
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

//    public function findOneBySomeField($value): ?SecondHandCar
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

//return SecondHandCars[]
public function findSearch(SearchData $search): array
{
    $query = $this
        ->createQueryBuilder('s')
        ->select('b', 's')
        ->join('s.brand', 'b');
    //return $this->findAll();
    if(!empty($search->q)) {
        $query = $query
            ->andWhere('s.name LIKE :q')
            ->setParameter('q', "%{$search->q}%");
    }
    if(!empty($search->min)) {
        $query = $query
            ->andWhere('s.price >= :min')
            ->setParameter('min', "%{$search->min}%");
    }
    if(!empty($search->max)) {
        $query = $query
            ->andWhere('s.price <= : max')
            ->setParameter('max', "%{$search->max}%");
    }

    if(!empty($search->km)) {
        $query = $query
            ->andWhere('s.km = km')
            ->setParameter('km', "%{$search->km}%");
    }
    if(!empty($search->year)) {
        $query = $query
            ->andWhere('s.year =  year')
            ->setParameter('year', "%{$search->year}%");
    }

    if(!empty($search->brands)) {
        $query = $query
            ->andWhere('b.id IN (: brands)')
            ->setParameter('brands', "%{$search->brands}%");
    }


    return $query->getQuery()->getResult();
}
}
