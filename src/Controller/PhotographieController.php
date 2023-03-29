<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Entity\Photographie;
use App\Entity\User;
use App\Form\GalerieType;
use App\Form\PhotographieType;
use App\Form\UserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhotographieController extends AbstractController
{
    #[Route('/photographie', name: 'app_photographie')]
    public function index(): Response
    {
        return $this->render('photographie/index.html.twig', [
            'controller_name' => 'PhotographieController',
        ]);
    }

    #[Route('/photographie/create', name: 'create_photographie')]
    public function createPhotographie(ManagerRegistry $doctrine, Request $request): Response
    {
        $photographie = new Photographie();
        $form = $this->createForm(PhotographieType::class, $photographie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($photographie);
            $entityManager->flush();

            return $this->redirectToRoute('app_photographie');
        }

        return $this->render('photographie/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // test galerie

    #[Route('/photographie/galeriecreate', name: 'create_galerie')]
    public function galerieTest(ManagerRegistry $doctrine, Request $request): Response
    {
        $galerie = new Galerie();
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($galerie);
            $entityManager->flush();

            return $this->redirectToRoute('app_photographie');
        }

        return $this->render('photographie/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
