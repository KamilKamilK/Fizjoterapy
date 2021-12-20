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

     /**
      * Repository method for finding the newest inserted
      * entry inside the database. Will return the latest
      * entry when one is existent, otherwise will return
      * null.
      */

    public function findLastInserted()
    {
        return $this
            ->createQueryBuilder("e")
            ->orderBy("id", "DESC")
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findFizicalMethods()
    {
        return $this
            ->createQueryBuilder("e")
            ->orderBy("e.name", "ASC")
            ->where('e.type = :typ')
            ->setParameter(':typ', 'fizykoterapia')
            ->getQuery()
            ->getResult();
    }
    public function findKinezyMethods()
    {
        return $this
            ->createQueryBuilder("e")
            ->orderBy("e.name", "ASC")
            ->where('e.type = :typ')
            ->setParameter(':typ', 'kinezyterapia')
            ->getQuery()
            ->getResult();
    }

    public function findMasages()
    {
        return $this
            ->createQueryBuilder("e")
            ->orderBy("e.name", "ASC")
            ->where('e.type = :typ')
            ->setParameter(':typ', 'masaz')
            ->getQuery()
            ->getResult();
    }

    public function findAllMethodsDESC()
    {
        return $this
            ->createQueryBuilder("e")
            ->orderBy("e.id", "DESC")
            ->getQuery()
            ->getResult();
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
