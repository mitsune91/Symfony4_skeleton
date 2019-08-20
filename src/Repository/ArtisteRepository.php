<?php

namespace App\Repository;

use App\Entity\Artiste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Artiste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artiste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artiste[]    findAll()
 * @method Artiste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtisteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Artiste::class);
    }

     /**
      * @return Artiste[] Returns an array of Artiste objects

    */
    public function findOne()
    {
        return $this->createQueryBuilder('a')


            ->orderBy('a.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Artiste
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
