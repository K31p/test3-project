<?php

namespace App\Repository;

use App\Entity\TakeOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TakeOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method TakeOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method TakeOrder[]    findAll()
 * @method TakeOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TakeOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TakeOrder::class);
    }

    // /**
    //  * @return TakeOrder[] Returns an array of TakeOrder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TakeOrder
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
