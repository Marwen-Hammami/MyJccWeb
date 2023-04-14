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
        $vote = $repo->find($id);
        $form = $this->createForm(VoteType::class, $vote);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('vote_index');
        }else{
        return $this->render('vote/ModifierVote.html.twig', [
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

}
