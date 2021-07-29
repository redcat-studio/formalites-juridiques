<?php

namespace App\Repository;

use App\Entity\CompanyIdentity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompanyIdentity|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyIdentity|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyIdentity[]    findAll()
 * @method CompanyIdentity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyIdentityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyIdentity::class);
    }

    // /**
    //  * @return CompanyIdentity[] Returns an array of CompanyIdentity objects
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
    public function findOneBySomeField($value): ?CompanyIdentity
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
