<?php

namespace App\Controller;

use App\Entity\Photographie;
use App\Entity\Galerie;
use App\Form\PhotographieType;
use App\Repository\GalerieRepository;
use App\Repository\PhotographieRepository;
use phpDocumentor\Reflection\PseudoTypes\False_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/photographie')]
class PhotographieController extends AbstractController
{
    //Routes for Code name One //////////////////////////////////////////

    //afficher toutes les photographies
    #[Route('/mobileAll', name: 'app_photographie_mobile_index')]
    public function indexMobile(PhotographieRepository $photographieRepository, SerializerInterface $serializer)
    {
        $photographies = $photographieRepository->findAll();

        $json = $serializer->serialize($photographies, 'json', ['groups' => "photographies"]);

        return new Response($json);
    }

    //afficher les photographies d'un utilisateur grace à l'id galerie
    #[Route('/mobileShowphotos/{idGalerie}', name: 'app_photographie_mobile_show_photos', methods: ['GET'])]
    public function indexPhotosMobile($idGalerie, PhotographieRepository $photographieRepository, SerializerInterface $serializer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $galerie = $entityManager->getRepository(Galerie::class)->find($idGalerie);

        $photographies = $photographieRepository->findBy(['idGalerie' => $idGalerie]);

        $json = $serializer->serialize($photographies, 'json', ['groups' => "photographies"]);

        return new Response($json);
    }

    //afficher une photo
    #[Route('/mobileDetails/{idPhotographie}', name: 'app_photographie_show_mobile', methods: ['GET'])]
    public function Mobileshow(Photographie $photographie, SerializerInterface $serializer)
    {
        $json = $serializer->serialize($photographie, 'json', ['groups' => "photographies"]);

        return new Response($json);
    }

    //ajouter une photographie
    // http://127.0.0.1:8000/photographie/mobileNew?nom=testNom&description=testDesc&path=pathToImage&idGal=1
    #[Route('/mobileNew', name: 'app_photographie_newMobile')]
    public function Mobilenew(GalerieRepository $repository, Request $rq, NormalizerInterface $Normalizer)
    {
        //créer un object galerie à partir de l'id donnée
        $galerie = $repository->find($rq->get('idGal'));

        $em = $this->getDoctrine()->getManager();
        $photo = new Photographie();

        $photo->setNom($rq->get('nom'));
        $photo->setDescription($rq->get('description'));
        $photo->setPhotographiepath($rq->get('path'));
        $photo->setIdGalerie($galerie);

        $em->persist($photo);
        $em->flush();

        $jsonContent = $Normalizer->normalize($photo, 'json', ['groups' => "photographies"]);
        return new Response(json_encode($jsonContent));
    }

    //modifier une photographie
    // http://127.0.0.1:8000/photographie/mobileUpdate/63?nom=testNewNom&description=testNewDesc&path=pathToImage&idGal=1
    #[Route('/mobileUpdate/{id}', name: 'app_photographie_UpdateMobile')]
    public function MobileUpdate(GalerieRepository $repository, $id, Request $rq, NormalizerInterface $Normalizer)
    {
        //créer un object galerie à partir de l'id donnée
        $galerie = $repository->find($rq->get('idGal'));

        $em = $this->getDoctrine()->getManager();
        $photo = $em->getRepository(Photographie::class)->find($id);

        $photo->setNom($rq->get('nom'));
        $photo->setDescription($rq->get('description'));
        $photo->setPhotographiepath($rq->get('path'));
        $photo->setIdGalerie($galerie);

        $em->flush();

        $jsonContent = $Normalizer->normalize($photo, 'json', ['groups' => "photographies"]);
        return new Response("Photographie modifié avec succès" . json_encode($jsonContent));
    }

    //supprimer une photographie
    // http://127.0.0.1:8000/photographie/mobileDelete/69
    #[Route('/mobileDelete/{id}', name: 'app_photographie_DeleteMobile')]
    public function MobileDelete($id, Request $rq, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $photo = $em->getRepository(Photographie::class)->find($id);

        $em->remove($photo);
        $em->flush();

        $jsonContent = $Normalizer->normalize($photo, 'json', ['groups' => "photographies"]);
        return new Response("Photographie supprimé avec succès" . json_encode($jsonContent));
    }

    ////////////////////////////////////////////////////////////////////

    #[Route('/EditeurImage', name: 'app_contratsponsoring_EditeurImage', methods: ['GET'])]
    public function EditeurImage(): Response
    {
        return $this->render('photographie/ImageEditor.html.twig');
    }
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
