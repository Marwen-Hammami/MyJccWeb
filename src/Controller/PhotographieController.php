<?php

namespace App\Controller;

use App\Entity\Photographie;
use App\Entity\Galerie;
use App\Form\PhotographieType;
use App\Repository\PhotographieRepository;
use phpDocumentor\Reflection\PseudoTypes\False_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/photographie')]
class PhotographieController extends AbstractController
{
    // Debut Chemains de l'administrateur *****************************************************
    #[Route('/admin', name: 'app_photographie_admin_index', methods: ['GET'])]
    public function indexAdmin(PhotographieRepository $photographieRepository): Response
    {
        return $this->render('photographie/back/index.html.twig', [
            'photographies' => $photographieRepository->findAll(),
        ]);
    }
    #[Route('/admin/{idPhotographie}', name: 'app_photographie_admin_show', methods: ['GET'])]
    public function showAdmin(Photographie $photographie): Response
    {
        return $this->render('photographie/back/show.html.twig', [
            'photographie' => $photographie,
        ]);
    }
    #[Route('/admin/{idPhotographie}', name: 'app_photographie_admin_delete', methods: ['POST'])]
    public function deleteAdmin(Request $request, Photographie $photographie, PhotographieRepository $photographieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $photographie->getIdPhotographie(), $request->request->get('_token'))) {
            $photographieRepository->remove($photographie, true);
        }

        return $this->redirectToRoute('app_photographie_admin_index', [], Response::HTTP_SEE_OTHER);
    }
    // Fin Chemains de l'administrateur *******************************************************
    #[Route('/', name: 'app_photographie_index', methods: ['GET'])]
    public function index(PhotographieRepository $photographieRepository, SessionInterface $session): Response
    {

        $galerie = $session->get('galerie');

        return $this->render('photographie/index.html.twig', [
            'photographies' => $photographieRepository->findBy(['idGalerie' => $galerie->getIdGalerie()]),
        ]);
    }
    #[Route('/showphotos/{idGalerie}', name: 'app_photographie_show_photos', methods: ['GET'])]
    public function indexPhotos($idGalerie, PhotographieRepository $photographieRepository, SessionInterface $session): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $galerie = $entityManager->getRepository(Galerie::class)->find($idGalerie);

        return $this->render('galerie/showPhotos.html.twig', [
            'photographies' => $photographieRepository->findBy(['idGalerie' => $idGalerie]),
            'galerie' => $galerie,
        ]);
    }

    #[Route('/new', name: 'app_photographie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PhotographieRepository $photographieRepository, SessionInterface $session): Response
    {
        $photographie = new Photographie();

        $form = $this->createForm(PhotographieType::class, $photographie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('photographiepath')->getData();
            if ($uploadedFile) {
                $destination = 'C:\xampp\htdocs\myjcc\photographies'; // update this line   
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = 'http://localhost/myjcc/photographies/' . $originalFilename . '-' . uniqid() . '.' . $uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $photographie->setPhotographiepath($newFilename);

                $photographieRepository->save($photographie, true);

                return $this->redirectToRoute('app_photographie_index', [], Response::HTTP_SEE_OTHER);
            } else {
                return $this->renderForm('photographie/new.html.twig', [
                    'photographie' => $photographie,
                    'form' => $form,
                    'isEdit' => 0,
                ]);
            }
        }

        return $this->renderForm('photographie/new.html.twig', [
            'photographie' => $photographie,
            'form' => $form,
        ]);
    }

    #[Route('/{idPhotographie}', name: 'app_photographie_show', methods: ['GET'])]
    public function show(Photographie $photographie): Response
    {
        return $this->render('photographie/show.html.twig', [
            'photographie' => $photographie,
        ]);
    }

    #[Route('/{idPhotographie}/edit', name: 'app_photographie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Photographie $photographie, PhotographieRepository $photographieRepository): Response
    {
        $form = $this->createForm(PhotographieType::class, $photographie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photographieRepository->save($photographie, true);

            return $this->redirectToRoute('app_photographie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('photographie/edit.html.twig', [
            'photographie' => $photographie,
            'form' => $form,
            'isEdit' => 1,
        ]);
    }

    #[Route('/{idPhotographie}', name: 'app_photographie_delete', methods: ['POST'])]
    public function delete(Request $request, Photographie $photographie, PhotographieRepository $photographieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $photographie->getIdPhotographie(), $request->request->get('_token'))) {
            $photographieRepository->remove($photographie, true);
        }

        return $this->redirectToRoute('app_photographie_index', [], Response::HTTP_SEE_OTHER);
    }
}
