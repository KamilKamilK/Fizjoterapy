<?php

namespace App\Repository;

use App\Entity\Fizjoterapy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fizjoterapy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fizjoterapy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fizjoterapy[]    findAll()
 * @method Fizjoterapy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FizjoterapyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fizjoterapy::class);
    }

    // /**
    //  * @return Fizjoterapy[] Returns an array of Fizjoterapy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fizjoterapy
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}