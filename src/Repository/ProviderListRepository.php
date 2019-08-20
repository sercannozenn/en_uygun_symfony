<?php

namespace App\Repository;

use App\Entity\ProviderList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProviderList|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProviderList|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProviderList[]    findAll()
 * @method ProviderList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProviderListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProviderList::class);
    }

    // /**
    //  * @return ProviderList[] Returns an array of ProviderList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProviderList
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
