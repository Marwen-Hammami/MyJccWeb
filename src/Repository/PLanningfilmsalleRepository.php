<?php

namespace App\Repository;

use App\Entity\Planningfilmsalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Planningfilmsalle>
 *
 * @method Planningfilmsalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Planningfilmsalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Planningfilmsalle[]    findAll()
 * @method Planningfilmsalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PLanningfilmsalleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Planningfilmsalle::class);
    }

    public function save(Planningfilmsalle $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Planningfilmsalle $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Planningfilmsalle[] Returns an array of Planningfilmsalle objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Planningfilmsalle
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
