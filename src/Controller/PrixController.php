<?php

namespace App\Controller;

use App\Entity\Prix;
use App\Entity\Film;
use App\Form\PrixType;
use App\Repository\PrixRepository;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PrixController extends AbstractController
{
    #[Route('/Prix/create', name: 'create_prix')]
    public function createprix(ManagerRegistry $doctrine, Request $request): Response
    {
        $prix = new prix();
        $form = $this->createForm(prixType::class, $prix);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $EM = $doctrine->getManager();
            $EM->persist($prix);
            $EM->flush();
            return $this->redirectToRoute('prix_index');
        }
        $cancelButtonClicked = isset($request->request->get('prix')['cancel']);

        if ($cancelButtonClicked) {
            return $this->redirectToRoute('prix_index');
        }

        return $this->render('prix/Createprix.html.twig', [
            'prix' => $prix,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/prixs', name: 'prix_index')]
    public function getAllprix(prixRepository $repo): Response
    {
        $list = $repo->findAll();
        return $this->render('prix/getAllprix.html.twig', [
            'controller_name' => 'prixRepository',
            'list' => $list,
        ]);
    }

    #[Route('/prix/update/{id}', name: 'update_prix')]
    public function updatePrix(ManagerRegistry $doctrine, Request $request, $id, PrixRepository $repo)
    {
        $prix = new prix();
        $form = $this->createForm(PrixType::class, $prix);
        $prix = $repo->find($id);
        $form = $this->createForm(PrixType::class, $prix);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('prix_index');
        } else {
            return $this->render('prix/ModifierPrix.html.twig', [
                'prix' => $prix,
                'form' => $form->createView(),
            ]);
        }
    }

    #[Route('/prix/delete/{id}', name: 'prix_delete')]
    public function DeletePrix(PrixRepository $repo, ManagerRegistry $doctrine, $id): Response
    {
        $objet = $repo->find($id);
        $em = $doctrine->getManager();
        $em->remove($objet);
        $em->flush();
        return  $this->redirectToRoute('prix_index');
    }

    #[Route('/prix/{id}', name: 'prix_show')]
    public function getPrixByID($id, PrixRepository $repo, FilmRepository $FilmRepo)
    {
        $prix = $repo->find($id);

        $qb = $FilmRepo->createQueryBuilder('f');
        $qb->select('f.titre')
            ->where('f.idFilm = :idFilm')
            ->setParameter('idFilm', $prix->getIdFilm()->getIdFilm());
        $FilmName = $qb->getQuery()->getOneOrNullResult();

        $data = [
            'Film' => $FilmName['titre'],
            'typeprix' => $prix->getTypeprix(),
        ];

        return new JsonResponse($data);
    }
}
