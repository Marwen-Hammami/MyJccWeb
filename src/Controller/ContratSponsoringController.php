<?php

namespace App\Controller;

use App\Entity\Contratsponsoring;
use App\Form\ContratsponsoringType;
use App\Repository\ContratsponsoringRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contratsponsoring')]
class ContratsponsoringController extends AbstractController
{
    // Debut Chemains de l'administrateur *****************************************************
    #[Route('/admin', name: 'app_contratsponsoring_admin_index', methods: ['GET'])]
    public function indexAdmin(ContratsponsoringRepository $contratsponsoringRepository): Response
    {
        return $this->render('contratsponsoring/back/index.html.twig', [
            'contratsponsorings' => $contratsponsoringRepository->findAll(),
        ]);
    }

    #[Route('/admin/{idContrat}', name: 'app_contratsponsoring_admin_show', methods: ['GET'])]
    public function showAdmin(Contratsponsoring $contratsponsoring): Response
    {
        return $this->render('contratsponsoring/back/show.html.twig', [
            'contratsponsoring' => $contratsponsoring,
        ]);
    }

    #[Route('/admin/{idContrat}', name: 'app_contratsponsoring_admin_delete', methods: ['POST'])]
    public function deleteAdmin(Request $request, Contratsponsoring $contratsponsoring, ContratsponsoringRepository $contratsponsoringRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contratsponsoring->getIdContrat(), $request->request->get('_token'))) {
            $contratsponsoringRepository->remove($contratsponsoring, true);
        }

        return $this->redirectToRoute('app_contratsponsoring_admin_index', [], Response::HTTP_SEE_OTHER);
    }

    // Fin Chemains de l'administrateur *******************************************************
    #[Route('/', name: 'app_contratsponsoring_index', methods: ['GET'])]
    public function index(ContratsponsoringRepository $contratsponsoringRepository): Response
    {
        return $this->render('contratsponsoring/index.html.twig', [
            'contratsponsorings' => $contratsponsoringRepository->findAll(),
        ]);
    }
    #[Route('/mescontrats', name: 'app_contratsponsoring_index_mes_contrats', methods: ['GET'])]
    public function indexMesContrats(ContratsponsoringRepository $contratsponsoringRepository, SessionInterface $session): Response
    {
        $user = $session->get('user');

        if ($user->getRole() == 'SPONSOR') {
            # code...
            return $this->render('contratsponsoring/index.html.twig', [
                'contratsponsorings' => $contratsponsoringRepository->findBy(['idSponsor' => $user->getIdUser()]),
            ]);
        } elseif ($user->getRole() == 'PHOTOGRAPHE') {
            return $this->render('contratsponsoring/index.html.twig', [
                'contratsponsorings' => $contratsponsoringRepository->findBy(['idPhotographe' => $user->getIdUser()]),
            ]);
        }
        // return $this->render('contratsponsoring/index.html.twig', [
        //     'contratsponsorings' => $contratsponsoringRepository->findAll(),
        // ]);
    }

    #[Route('/new', name: 'app_contratsponsoring_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContratsponsoringRepository $contratsponsoringRepository): Response
    {
        $contratsponsoring = new Contratsponsoring();
        $form = $this->createForm(ContratsponsoringType::class, $contratsponsoring);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contratsponsoringRepository->save($contratsponsoring, true);

            return $this->redirectToRoute('app_contratsponsoring_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contratsponsoring/new.html.twig', [
            'contratsponsoring' => $contratsponsoring,
            'form' => $form,
        ]);
    }

    #[Route('/{idContrat}', name: 'app_contratsponsoring_show', methods: ['GET'])]
    public function show(Contratsponsoring $contratsponsoring): Response
    {
        return $this->render('contratsponsoring/show.html.twig', [
            'contratsponsoring' => $contratsponsoring,
        ]);
    }

    #[Route('/{idContrat}/edit', name: 'app_contratsponsoring_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contratsponsoring $contratsponsoring, ContratsponsoringRepository $contratsponsoringRepository): Response
    {
        $form = $this->createForm(ContratsponsoringType::class, $contratsponsoring);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contratsponsoringRepository->save($contratsponsoring, true);

            return $this->redirectToRoute('app_contratsponsoring_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contratsponsoring/edit.html.twig', [
            'contratsponsoring' => $contratsponsoring,
            'form' => $form,
        ]);
    }

    #[Route('/{idContrat}', name: 'app_contratsponsoring_delete', methods: ['POST'])]
    public function delete(Request $request, Contratsponsoring $contratsponsoring, ContratsponsoringRepository $contratsponsoringRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contratsponsoring->getIdContrat(), $request->request->get('_token'))) {
            $contratsponsoringRepository->remove($contratsponsoring, true);
        }

        return $this->redirectToRoute('app_contratsponsoring_index', [], Response::HTTP_SEE_OTHER);
    }
}
