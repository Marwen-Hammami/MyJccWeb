<?php

namespace App\Controller;

use App\Entity\Vote;
use App\Entity\User;
use App\Entity\Film;
use App\Form\VoteType;
use App\Repository\VoteRepository;
use App\Repository\UserRepository;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use Doctrine\ORM\EntityRepository;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class VoteController extends AbstractController
{
    #[Route('/vote/create', name: 'create_vote')]
    public function createVote(ManagerRegistry $doctrine, Request $request): Response
    {
        $vote = new vote();
        $vote->setDateVote(new \DateTime());
        $form = $this->createForm(VoteType::class, $vote);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $EM = $doctrine->getManager();
            $EM->persist($vote);
            $EM->flush();
            return $this->redirectToRoute('vote_index');
        }
        $cancelButtonClicked = isset($request->request->get('vote')['cancel']);

        if ($cancelButtonClicked) {
            return $this->redirectToRoute('vote_index');
        }

        return $this->render('vote/Createvote.html.twig', [
            'vote' => $vote,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/votes', name: 'vote_index')]
    public function getAllVote(voteRepository $repo): Response
    {
        $list = $repo->findAll();
        return $this->render('vote/getAllVote.html.twig', [
            'controller_name' => 'VoteRepository',
            'list' => $list,
        ]);
    }

    #[Route('/vote/update/{id}', name: 'update_vote')]
    public function updateVote(ManagerRegistry $doctrine, Request $request, $id, VoteRepository $repo)
    {
        $vote = new vote();
        $vote->setDateVote(new \DateTime());
        $form = $this->createForm(VoteType::class, $vote);
        $vote = $repo->find($id);
        $form = $this->createForm(VoteType::class, $vote);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('vote_index');
        }else{
        return $this->render('vote/ModifierVote.html.twig', [
            'vote' => $vote,
            'form' => $form->createView(),
        ]);
        }
    }

    #[Route('/vote/delete/{id}', name: 'vote_delete')]
    public function DeleteVote(VoteRepository $repo, ManagerRegistry $doctrine, $id): Response
    {
        $objet = $repo->find($id);
        $em = $doctrine->getManager();
        $em->remove($objet);
        $em->flush();
        return  $this->redirectToRoute('vote_index');
    }

    #[Route('/vote/{id}', name: 'vote_show')]
    public function getVoteByID($id, VoteRepository $repo, FilmRepository $FilmRepo, UserRepository $userRepo)
    {
        $vote = $repo->find($id);
        
        $qb = $FilmRepo->createQueryBuilder('f');
        $qb->select('f.titre')
           ->where('f.idFilm = :idFilm')
           ->setParameter('idFilm', $vote->getIdFilm()->getIdFilm());
        $FilmName = $qb->getQuery()->getOneOrNullResult();
    
        $qb = $userRepo->createQueryBuilder('u');
        $qb->select('u.nom')
           ->where('u.id = :userId')
           ->setParameter('userId', $vote->getIdUser()->getIdUser());
        $userName = $qb->getQuery()->getOneOrNullResult();
    
        $data = [
            'valeur' => $vote->getValeur(),
            'user' => $userName['nom'],
            'Film' => $FilmName['titre'],
            'commentaire' => $vote->getCommentaire(),
            'dateVote' => $vote->getDateVote(),
            'vote' => $vote->getVoteFilm(),
        ];
        
        return new JsonResponse($data);
    }

    #[Route('/vote/{email}', name:'mes_votes')]
    public function GetReservation(UserRepository $request, string $email): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $userRepository = $this->getDoctrine()->getRepository(User::class);
        $user = $userRepository->findOneBy(['email' => $email]);
    
        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }
    
        $votes = $entityManager->createQueryBuilder()
        ->select('v')
        ->from('App\Entity\Vote', 'v')
        ->where('v.idUser = :userId')
        ->setParameter('userId', $user->getIdUser())
        ->getQuery()
        ->getResult();
    
        return $this->render('vote/index.html.twig', [
            'user' => $user,
            'votes' => $votes,
        ]);
    }

    /**
     * @Route("/admin", name="display_admin")
     */
    public function indexAdmin(): Response
    {

        return $this->render('admin/admin.html.twig'
        );
    }



#[Route('/chartjs', name: 'app_chartjs')]
    public function index(VoteRepository $voteRepository, ChartBuilderInterface $chartBuilder): Response
    {
        // Get the number of votes by day
    $votesByDay = $voteRepository->getVotesByDay();

    // Format the data for the chart
    $labels = array_keys($votesByDay);
    $data = array_values($votesByDay);

    // Create the chart
    $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
    $chart->setData([
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Number of Votes per Day',
                'backgroundColor' => 'rgb(255, 99, 132)',
                'borderColor' => 'rgb(255, 99, 132)',
                'data' => $data,
            ],
        ],
    ]);
    
    $chart->setOptions([/* ... */]);

    return $this->render('chartjs/index.html.twig', [
        'controller_name' => 'ChartjsController',
        'chart' => $chart,
    ]);

}

/* pourcentage te3 l rate par genre */
public function yourAction(EntityManagerInterface $entityManager)
    {
        $queryBuilder = $entityManager->createQueryBuilder();
        
        $queryBuilder->select('f.Genre', 'SUM(v.Valeur) / total_votes.Total')
            ->from('App\Entity\Film', 'f')
            ->innerJoin('f.vote', 'v')
            ->crossJoin('(SELECT SUM(Valeur) AS Total FROM App\Entity\Vote) total_votes')
            ->groupBy('f.Genre');
        
        $results = $queryBuilder->getQuery()->getResult();
        
        return new Response(var_export($results, true));
    }

    /* 3dad l votes par film */
    public function chartAction(EntityManagerInterface $em): Response
    {
        $qb = $em->createQueryBuilder();
        $qb->select('f.Titre as film_title, COUNT(v.ID_Vote) as num_votes')
           ->from('App\Entity\Film', 'f')
           ->join('f.votes', 'v')
           ->where('v.Vote_Film = 1')
           ->groupBy('f.Titre');

        $results = $qb->getQuery()->getResult();

        // Create an array of labels and an array of data from the results
        $labels = array_map(function ($result) {
            return $result['film_title'];
        }, $results);

        $data = array_map(function ($result) {
            return $result['num_votes'];
        }, $results);

        // Convert the arrays to JSON format for use in the JavaScript chart
        $labels_json = json_encode($labels);
        $data_json = json_encode($data);

        return $this->render('chart.html.twig', [
            'labels' => $labels_json,
            'data' => $data_json,
        ]);
    }
}
