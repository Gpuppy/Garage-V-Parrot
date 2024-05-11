<?php

namespace App\Repository;

use App\Entity\SecondHandCar;
use App\Model\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
//use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;



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


    private $paginator;
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, SecondHandCar::class);
        $this->paginator = $paginator;
    }

    public function paginateSecondHandCars(int $page, int $limit): PaginationInterface
    {
        return $this->paginator->paginate(
            $this-> createQueryBuilder('s'),
            $page,
            $limit
        );
    }

    /**
     * get products with search
     * @return PaginationInterface
     */
    public function findSearch(SearchData $search): PaginationInterface
    {
        $query = $this->getSearchQuery($search)->getQuery();
        return $this->paginator->paginate(
            $query,
            $search->page,
            9
        );    /*return $query->getQuery()->getResult();*/
    }


        /**
         * Gets minimum and maximum price searched
         * @return integer[]
         */
    public function findMinMax(SearchData $search): array
    {
        $results = $this->getSearchQuery($search, true)
            ->select('MIN(s.price) as min', 'MAX(s.price) as max')
            //->select('MIN(s.km) as min', 'MAX(s.km) as max')
            //->select('MIN(s.year) as min', 'MAX(s.year) as max')
            ->getQuery()
            ->getScalarResult();
        return [(int)$results[0]['min'], (int)$results[0]['max']];
    }

    private function getSearchQuery (SearchData $search, $ignorePrice = false): QueryBuilder
    {
        $query = $this
            ->createQueryBuilder('s')
            ->select('b', 's')
            ->join('s.brand', 'b');
        //return $this->findAll();
        /*if(!empty($search->q)) {
            $query = $query
                ->andWhere('s.name LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }*/
        /*if(!empty($search->min) && $ignorePrice === false) {
            $query = $query
                ->andWhere('s.price >= :min')
                ->setParameter('min', $search->min);
        }
        if(!empty($search->max) && $ignorePrice === false) {
            $query = $query
                ->andWhere('s.price <= :max')
                ->setParameter('max', $search->max);
        }*/

        if(!empty($search->minPrice)) {
            $query = $query
                ->andWhere('s.price >= :minPrice')
                ->setParameter('minPrice', $search->minPrice);
        }

        if(!empty($search->maxPrice)) {
            $query = $query
                ->andWhere('s.price <= :maxPrice')
                ->setParameter('maxPrice', $search->maxPrice);
        }
        /*if(!empty($search->km)) {
            $query = $query
                ->andWhere('s.km <= :km')
                ->setParameter('km', $search->km);
        }*/

        if(!empty($search->minKm)) {
            $query = $query
                ->andWhere('s.km >= :minKm')
                ->setParameter('minKm', $search->minKm);
        }

        if(!empty($search->maxKm)) {
            $query = $query
                ->andWhere('s.km <= :maxKm')
                ->setParameter('maxKm', $search->maxKm);
        }

        /*if(!empty($search->year)) {
            $query = $query
                ->andWhere('s.year <= :year')
                ->setParameter('year', $search->year);
        }*/

        if(!empty($search->minYear)) {
            $query = $query
                ->andWhere('s.Year >= :minYear')
                ->setParameter('minYear', $search->minYear);
        }

        if(!empty($search->maxYear)) {
            $query = $query
                ->andWhere('s.Year <= :maxYear')
                ->setParameter('maxYear', $search->maxYear);
        }


        if(!empty($search->brands)) {
            $query = $query
                ->andWhere('b.id IN (:brands)')
                ->setParameter('brands', $search->brands);
        }

        return $query;

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


}
