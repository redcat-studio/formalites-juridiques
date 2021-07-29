<?php

namespace App\Repository;

use App\Entity\CompanyExecutive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompanyExecutive|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyExecutive|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyExecutive[]    findAll()
 * @method CompanyExecutive[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyExecutiveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyExecutive::class);
    }

    // /**
    //  * @return CompanyExecutive[] Returns an array of CompanyExecutive objects
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
    public function findOneBySomeField($value): ?CompanyExecutive
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
