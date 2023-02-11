<?php

namespace App\Repository;

use App\Entity\Carsup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Carsup>
 *
 * @method Carsup|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carsup|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carsup[]    findAll()
 * @method Carsup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carsup::class);
    }

    public function add(Carsup $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Carsup $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

     /**
    * @return Carsup[] Returns an array of Carsup objects
    */
   public function findBySupp($value): array
   {
    return $this->createQueryBuilder('cs')
           ->select('s.name, cs.price')
           ->innerJoin('cs.cars','c')
           ->innerJoin('cs.sups','s')
           ->where('c.id = :val')
           ->setParameter('val', $value)
           ->getQuery()
           ->getResult()
           ;
   }  

//    /**
//     * @return Carsup[] Returns an array of Carsup objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Carsup
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
