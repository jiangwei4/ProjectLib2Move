<?php

namespace App\Repository;

use App\Entity\OffreLocations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OffreLocations|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffreLocations|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffreLocations[]    findAll()
 * @method OffreLocations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreLocationsUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OffreLocations::class);
    }

    // /**
    //  * @return OffreLocations[] Returns an array of OffreLocations objects
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
    public function findOneBySomeField($value): ?OffreLocations
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