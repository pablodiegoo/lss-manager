<?php

namespace App\Repository;

use App\Entity\BaseResource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BaseResource|null find($id, $lockMode = null, $lockVersion = null)
 * @method BaseResource|null findOneBy(array $criteria, array $orderBy = null)
 * @method BaseResource[]    findAll()
 * @method BaseResource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaseResourceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BaseResource::class);
    }

    // /**
    //  * @return BaseResource[] Returns an array of BaseResource objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BaseResource
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
