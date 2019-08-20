<?php

namespace App\Repository;

use App\Entity\CurrentCurrency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CurrentCurrency|null find($id, $lockMode = null, $lockVersion = null)
 * @method CurrentCurrency|null findOneBy(array $criteria, array $orderBy = null)
 * @method CurrentCurrency[]    findAll()
 * @method CurrentCurrency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrentCurrencyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CurrentCurrency::class);
    }

    // /**
    //  * @return CurrentCurrency[] Returns an array of CurrentCurrency objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CurrentCurrency
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
