<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Form\GalerieType;
use App\Repository\GalerieRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/galerie')]
class GalerieController extends AbstractController
{
    //Routes for Code name One //////////////////////////////////////////

    //afficher toutes les galeries
    // http://127.0.0.1:8000/galerie/mobileAll
    #[Route('/mobileAll', name: 'app_galeries_mobile_index')]
    public function indexMobile(GalerieRepository $galerieRepository, SerializerInterface $serializer)
    {
        $galeries = $galerieRepository->findAll();

        $json = $serializer->serialize($galeries, 'json', ['groups' => "photographies"]);

        return new Response($json);
    }

    //afficher une galerie
    // http://127.0.0.1:8000/galerie/mobileDetails/1
    #[Route('/mobileDetails/{idGalerie}', name: 'app_galerie_show_mobile', methods: ['GET'])]
    public function Mobileshow(Galerie $galerie, SerializerInterface $serializer)
    {
        $json = $serializer->serialize($galerie, 'json', ['groups' => "photographies"]);

        return new Response($json);
    }

    //ajouter une galerie
    // http://127.0.0.1:8000/galerie/mobileNew?nom=testNom&description=testDesc&color=%230000&idUser=734
    #[Route('/mobileNew', name: 'app_galerie_newMobile')]
    public function Mobilenew(UserRepository $repository, Request $rq, NormalizerInterface $Normalizer)
    {
        //créer un objet user a partir de l id
        $user = $repository->find($rq->get('idUser'));

        $em = $this->getDoctrine()->getManager();
        $galerie = new Galerie();

        $galerie->setNom($rq->get('nom'));
        $galerie->setDescription($rq->get('description'));
        $galerie->setCouleurhtml($rq->get('color'));
        $galerie->setIdPhotographe($user);

        $em->persist($galerie);
        $em->flush();

        $jsonContent = $Normalizer->normalize($galerie, 'json', ['groups' => "photographies"]);
        return new Response(json_encode($jsonContent));
    }

    //modifier une galerie
    // %23 = #
    // http://127.0.0.1:8000/galerie/mobileUpdate/729?nom=testModif&description=testDesc&color=%23fffff&idUser=734
    #[Route('/mobileUpdate/{id}', name: 'app_galerie_UpdateMobile')]
    public function MobileUpdate(UserRepository $repository, $id, Request $rq, NormalizerInterface $Normalizer)
    {
        //créer un objet user a partir de l id
        $user = $repository->find($rq->get('idUser'));

        $em = $this->getDoctrine()->getManager();
        $galerie = $em->getRepository(Galerie::class)->find($id);

        $galerie->setNom($rq->get('nom'));
        $galerie->setDescription($rq->get('description'));
        $galerie->setCouleurhtml($rq->get('color'));
        $galerie->setIdPhotographe($user);

        $em->flush();

        $jsonContent = $Normalizer->normalize($galerie, 'json', ['groups' => "photographies"]);
        return new Response("Galerie modifié avec succès" . json_encode($jsonContent));
    }

    //supprimer une galerie
    // http://127.0.0.1:8000/galerie/mobileDelete/729
    #[Route('/mobileDelete/{id}', name: 'app_galerie_DeleteMobile')]
    public function MobileDelete($id, Request $rq, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $galerie = $em->getRepository(Galerie::class)->find($id);

        $em->remove($galerie);
        $em->flush();

        $jsonContent = $Normalizer->normalize($galerie, 'json', ['groups' => "photographies"]);
        return new Response("Galerie supprimé avec succès" . json_encode($jsonContent));
    }

    ////////////////////////////////////////////////////////////////////

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
