<?php

namespace App\Repository;

use App\Entity\OffreDeLocationsBis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OffreDeLocationsBis|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffreDeLocationsBis|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffreDeLocationsBis[]    findAll()
 * @method OffreDeLocationsBis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreDeLocationsBisRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OffreDeLocationsBis::class);
    }

    // /**
    //  * @return OffreDeLocationsBis[] Returns an array of OffreDeLocationsBis objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OffreDeLocationsBis
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
