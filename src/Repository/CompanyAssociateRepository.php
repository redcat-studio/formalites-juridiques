<?php

namespace App\Repository;

use App\Entity\CompanyAssociate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompanyAssociate|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyAssociate|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyAssociate[]    findAll()
 * @method CompanyAssociate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyAssociateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyAssociate::class);
    }

    // /**
    //  * @return CompanyAssociate[] Returns an array of CompanyAssociate objects
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
    public function findOneBySomeField($value): ?CompanyAssociate
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
