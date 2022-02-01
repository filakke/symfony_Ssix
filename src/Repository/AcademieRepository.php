<?php

namespace App\Repository;

use App\Entity\Academie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Academie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Academie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Academie[]    findAll()
 * @method Academie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcademieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Academie::class);
    }

    // /**
    //  * @return Academie[] Returns an array of Academie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Academie
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
