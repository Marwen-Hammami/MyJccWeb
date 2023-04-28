<?php

namespace App\Repository;

use App\Entity\Vote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

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

        /**
    * Returns the number of votes by day and days.
    *
    * @return array An array where keys are the dates and values are the number of votes.
    */
    public function getVotesFilmByDay()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
            SELECT v.dateVote AS day, SUM(v.voteFilm) AS votes
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

    /* pourcentage l rate par genre */
    public function getRatePerGenre()
{
    $entityManager = $this->getEntityManager();
    
    $sql = "SELECT f.genre AS genre, SUM(v.valeur) / total_votes.total AS rate
        FROM film f
        INNER JOIN vote v ON f.ID_film = v.ID_Film
        CROSS JOIN (SELECT SUM(valeur) AS total FROM vote) total_votes
        GROUP BY f.genre";

    $rsm = new ResultSetMapping();
    $rsm->addScalarResult('genre', 'genre');
    $rsm->addScalarResult('rate', 'rate');
    $query = $entityManager->createNativeQuery($sql, $rsm);



    
    $results = $query->getResult();
    
    return $results;
}

/* 3dad l votes par film */
public function getVotesPerFilm()
{
    $entityManager = $this->getEntityManager();
    
    $sql = "SELECT f.Titre as film_title, COUNT(v.ID_Vote) as num_votes
            FROM Film f
            JOIN Vote v ON f.ID_film = v.ID_Film
            WHERE v.Vote_Film = 1
            GROUP BY f.Titre";

    $rsm = new ResultSetMapping();
    $rsm->addScalarResult('film_title', 'film_title');
    $rsm->addScalarResult('num_votes', 'num_votes');
    $query = $entityManager->createNativeQuery($sql, $rsm);

    $results = $query->getResult();
    
    return $results;
}


public function findVoteByNsc($commentaire)
{
    
    $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
        'SELECT v
         FROM App\Entity\Vote v
         WHERE v.commentaire LIKE :commentaire'
    )->setParameter('commentaire', '%'.$commentaire.'%');

    return $query->getResult();
}

// public function findByFirstNameAndLastName(string $firstName, string $lastName)
// {
//     $queryBuilder = $this->createQueryBuilder('v')
//         ->leftJoin('v.user', 'u')
//         ->where('u.firstName LIKE :firstName')
//         ->andWhere('u.lastName LIKE :lastName')
//         ->setParameter('firstName', '%'.$firstName.'%')
//         ->setParameter('lastName', '%'.$lastName.'%');

//     return $queryBuilder->getQuery()->getResult();
// }

    

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
