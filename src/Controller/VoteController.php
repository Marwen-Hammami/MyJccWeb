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
    #[Route('/recherche_ajax', name: 'recherche_ajax')]
    public function rechercheAjax(Request $request, VoteRepository $voteRepository): JsonResponse
    {
        $requestString = $request->query->get('searchValue');
    $resultats = $voteRepository->findVoteByNsc($requestString);

    $formattedResultats = array_map(function ($resultat) {
        return [
            'ID_Vote' => $resultat->getID_Vote(),
            'commentaire' => $resultat->getCommentaire(),
            // Add other fields here as needed
        ];
    }, $resultats);

    return new JsonResponse($formattedResultats);
    }
    
    
    
        #[Route('/search', name: 'app_user_search')]
        public function search(voteRepository $voteRepository, Request $request): Response
    
        {
                $list = $voteRepository->findAll();
                return $this->render('vote/search.html.twig', [
                    'votes' => $list,
                ]);
            
        }


    

//     public function search(Request $request): JsonResponse
// {
//     $firstName = $request->query->get('firstName');
//     $lastName = $request->query->get('lastName');

//     $votes = $this->getDoctrine()->getRepository(Vote::class)
//         ->findByFirstNameAndLastName($firstName, $lastName);

//     $data = [];

//     foreach ($votes as $vote) {
//         $data[] = [
//             'firstName' => $vote->getIdUser()->getPrenom(),
//             'lastName' => $vote->getIdUser()->getNom(),
//             'vote' => $vote->getAllVote(),
//         ];
//     }

//     return $this->json([
//         'data' => $data,
//     ]);
// }



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

    // #[Route('/vote/{email}', name:'mes_votes')]
    // public function GetReservation(UserRepository $request, string $email): Response
    // {
    //     $entityManager = $this->getDoctrine()->getManager();
    //     $userRepository = $this->getDoctrine()->getRepository(User::class);
    //     $user = $userRepository->findOneBy(['email' => $email]);
    
    //     if (!$user) {
    //         throw $this->createNotFoundException('User not found');
    //     }
    
    //     $votes = $entityManager->createQueryBuilder()
    //     ->select('v')
    //     ->from('App\Entity\Vote', 'v')
    //     ->where('v.idUser = :userId')
    //     ->setParameter('userId', $user->getIdUser())
    //     ->getQuery()
    //     ->getResult();
    
    //     return $this->render('vote/index.html.twig', [
    //         'user' => $user,
    //         'votes' => $votes,
    //     ]);
    // }

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
                'label' => 'Number of Rates per Day',
                'backgroundColor' => 'rgb(255, 99, 132)',
                'borderColor' => 'rgb(255, 99, 132)',
                'data' => $data,
            ],
        ],
    ]);
    
    $chart->setOptions([/* ... */]);

        /**************************** */
        // Get the number of votes by day
    $votesByDay2 = $voteRepository->getVotesFilmByDay();

    // Format the data for the chart
    $labels2 = array_keys($votesByDay2);
    $data2 = array_values($votesByDay2);

    // Create the chart
    $chart2 = $chartBuilder->createChart(Chart::TYPE_LINE);
    $chart2->setData([
        'labels' => $labels2,
        'datasets' => [
            [
                'label' => 'Number of Votes per Day',
                'backgroundColor' => 'rgb(255, 99, 132)',
                'borderColor' => 'rgb(255, 99, 132)',
                'data' => $data2,
            ],
        ],
    ]);
    
    $chart2->setOptions([/* ... */]);

        /******************************************************** */

     // Get the rate per genre
     $votesByGenre = $voteRepository->getRatePerGenre();
    
    // Format the data for the chart
    $labels = array_column($votesByGenre, 'genre');
    $data = array_column($votesByGenre, 'rate');
    
    // Create the chart
    $chart3 = $chartBuilder->createChart(Chart::TYPE_PIE);
    $chart3->setData([
        'labels' => $labels,
        'datasets' => [
            [
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                ],
                'data' => $data,
            ],
        ],
    ]);
    
    $chart3->setOptions([/* ... */]);
 
        /******************************************************** */

        $votesByFilm = $voteRepository->getVotesPerFilm();
    
    // Format the data for the chart
    $labels = array_column($votesByFilm, 'film_title');
    $data = array_column($votesByFilm, 'num_votes');
    
    // Create the chart
    $chart4 = $chartBuilder->createChart(Chart::TYPE_PIE);
    $chart4->setData([
        'labels' => $labels,
        'datasets' => [
            [
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                ],
                'data' => $data,
            ],
        ],
    ]);
    
    $chart4->setOptions([/* ... */]);

        /******************************************************** */
        return $this->render('chartjs/index.html.twig', [
            'controller_name' => 'ChartjsController',
            'chart' => $chart,
            'chart2' => $chart2,
            'chart3' => $chart3,
            'chart4' => $chart4,
        ]);

}




    
    
}
