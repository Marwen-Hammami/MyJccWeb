<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Form\GalerieType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GalerieController extends AbstractController
{
    #[Route('/galerie', name: 'app_galerie')]
    public function index(): Response
    {
        return $this->render('galerie/index.html.twig', [
            'controller_name' => 'GalerieController',
        ]);
    }

    #[Route('/galerie/galeriecreate', name: 'create_galerie')]
    public function galeriecreate(ManagerRegistry $doctrine, Request $request): Response
    {
        $galerie = new Galerie();
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($galerie);
            $entityManager->flush();

            return $this->redirectToRoute('app_galerie');
        }

        return $this->render('galerie/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
