<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Form\GalerieType;
use App\Repository\GalerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/galerie')]
class GalerieController extends AbstractController
{
    // Debut Chemains de l'administrateur *****************************************************
    #[Route('/admin', name: 'app_galerie_admin_index', methods: ['GET'])]
    public function indexAdmin(GalerieRepository $galerieRepository): Response
    {
        return $this->render('galerie/back/index.html.twig', [
            'galeries' => $galerieRepository->findAll(),
        ]);
    }
    #[Route('/admin/new', name: 'app_galerie_admin_new', methods: ['GET', 'POST'])]
    public function newAdmin(Request $request, GalerieRepository $galerieRepository): Response
    {
        $galerie = new Galerie();
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $galerieRepository->save($galerie, true);

            return $this->redirectToRoute('app_galerie_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('galerie/back/new.html.twig', [
            'galerie' => $galerie,
            'form' => $form,
        ]);
    }
    #[Route('/admin/{idGalerie}', name: 'app_galerie_admin_show', methods: ['GET'])]
    public function showAdmin(Galerie $galerie): Response
    {
        return $this->render('galerie/back/show.html.twig', [
            'galerie' => $galerie,
        ]);
    }
    #[Route('/admin/{idGalerie}', name: 'app_galerie_admin_delete', methods: ['POST'])]
    public function deleteAdmin(Request $request, Galerie $galerie, GalerieRepository $galerieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $galerie->getIdGalerie(), $request->request->get('_token'))) {
            $galerieRepository->remove($galerie, true);
        }

        return $this->redirectToRoute('app_galerie_admin_index', [], Response::HTTP_SEE_OTHER);
    }
    // Fin Chemains de l'administrateur *******************************************************
    #[Route('/', name: 'app_galerie_index', methods: ['GET'])]
    public function index(GalerieRepository $galerieRepository): Response
    {
        return $this->render('galerie/index.html.twig', [
            'galeries' => $galerieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_galerie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, GalerieRepository $galerieRepository): Response
    {
        $galerie = new Galerie();
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $galerieRepository->save($galerie, true);

            return $this->redirectToRoute('app_galerie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('galerie/new.html.twig', [
            'galerie' => $galerie,
            'form' => $form,
        ]);
    }

    #[Route('/{idGalerie}', name: 'app_galerie_show', methods: ['GET'])]
    public function show(Galerie $galerie): Response
    {
        return $this->render('galerie/show.html.twig', [
            'galerie' => $galerie,
        ]);
    }

    #[Route('/{idGalerie}/edit', name: 'app_galerie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Galerie $galerie, GalerieRepository $galerieRepository): Response
    {
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $galerieRepository->save($galerie, true);

            return $this->redirectToRoute('app_galerie_show', ['idGalerie' => $galerie->getIdGalerie()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('galerie/edit.html.twig', [
            'galerie' => $galerie,
            'form' => $form,
        ]);
    }

    #[Route('/{idGalerie}', name: 'app_galerie_delete', methods: ['POST'])]
    public function delete(Request $request, Galerie $galerie, GalerieRepository $galerieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $galerie->getIdGalerie(), $request->request->get('_token'))) {
            $galerieRepository->remove($galerie, true);
        }

        return $this->redirectToRoute('app_galerie_index', [], Response::HTTP_SEE_OTHER);
    }
}
