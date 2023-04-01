<?php

namespace App\Controller;

use App\Entity\Contratsponsoring;
use App\Form\ContratsponsoringType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContratSponsoringController extends AbstractController
{
    #[Route('/contrat/sponsoring', name: 'app_contrat_sponsoring')]
    public function index(): Response
    {
        return $this->render('contrat_sponsoring/index.html.twig', [
            'controller_name' => 'ContratSponsoringController',
        ]);
    }

    #[Route('/contrat/sponsoring/create', name: 'create_contrat_sponsoring')]
    public function createContrat(ManagerRegistry $doctrine, Request $request): Response
    {
        $contratsponsoring = new Contratsponsoring();
        $form = $this->createForm(ContratsponsoringType::class, $contratsponsoring);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($contratsponsoring);
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_sponsoring');
        }

        return $this->render('contrat_sponsoring/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
