<?php

namespace App\Repository;

use App\Entity\Vote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vote>
 *
 * @method Vote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vote[]    findAll()
 * @method Vote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vote::class);
    }

    public function save(Vote $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Vote $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

        /**
    * Returns the number of votes by day and days.
    *
    * @return array An array where keys are the dates and values are the number of votes.
    */
    public function getVotesByDay()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
            SELECT v.dateVote AS day, SUM(v.valeur) AS votes
            FROM App\Entity\Vote v
            GROUP BY day
        ');
    
        $results = $query->getResult();
    
        $votesByDay = array();
        foreach ($results as $result) {
            $day = $result['day']->format('Y-m-d'); // convert date to a string format
            $votesByDay[$day] = $result['votes'];
        }
    
        return $votesByDay;
    }

//    /**
//     * @return Vote[] Returns an array of Vote objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Vote
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
