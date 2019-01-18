<?php

namespace App\Repository;

use App\Entity\ImagesBlog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImagesBlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesBlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesBlog[]    findAll()
 * @method ImagesBlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesBlogRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImagesBlog::class);
    }

    // /**
    //  * @return ImagesBlog[] Returns an array of ImagesBlog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImagesBlog
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
