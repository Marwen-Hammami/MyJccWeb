<?php

namespace App\Controller;

use App\Entity\Contratsponsoring;
use App\Entity\User;
use App\Form\ContratsponsoringType;
use App\Repository\ContratsponsoringRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\PdfGenerator;
use DateTime;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/contratsponsoring')]
class ContratsponsoringController extends AbstractController
{
    //Routes for Code name One //////////////////////////////////////////

    //afficher toutes les contarts
    // http://127.0.0.1:8000/contratsponsoring/mobileAll
    #[Route('/mobileAll', name: 'app_contratsponsoring_mobile_index')]
    public function indexMobile(ContratsponsoringRepository $contratRepository, SerializerInterface $serializer)
    {
        $contrats = $contratRepository->findAll();

        $json = $serializer->serialize($contrats, 'json', ['groups' => "contratsponsoring"]);

        return new Response($json);
    }

    //afficher un contrat
    // http://127.0.0.1:8000/contratsponsoring/mobileDetails/63
    #[Route('/mobileDetails/{idContrat}', name: 'app_contratsponsoring_show_mobile', methods: ['GET'])]
    public function Mobileshow(Contratsponsoring $contratsponsoring, SerializerInterface $serializer)
    {
        $json = $serializer->serialize($contratsponsoring, 'json', ['groups' => "contratsponsoring"]);

        return new Response($json);
    }

    //afficher les contrats d'un sponsor

    //ajouter un contrat
    // http://127.0.0.1:8000/contratsponsoring/ncm?is=727&ip=734&d=2023-05-10&f=2023-06-12&t=ParPhoto&e=Proposition&s=9.2
    #[Route('/ncm', name: 'app_contratsponsoring_new_mobile')]
    public function newMobile(Request $req, NormalizerInterface $Normalizer)
    {
        $contratsponsoring = new Contratsponsoring();

        $entityManager = $this->getDoctrine()->getManager();

        $sponsor = new User();
        $sponsor = $entityManager->getRepository(User::class)->findOneBy(['idUser' => $req->get('is')]);
        $photographe = new User();
        $photographe = $entityManager->getRepository(User::class)->findOneBy(['idUser' => $req->get('ip')]);

        $contratsponsoring->setIdPhotographe($photographe);
        $contratsponsoring->setIdSponsor($sponsor);

        $contratsponsoring->setSignaturephotographe("-");
        $contratsponsoring->setSignaturesponsor("-");
        $contratsponsoring->setTermespdf("-");

        $contratsponsoring->setDatedebut(new \DateTime($req->get('d')));
        $contratsponsoring->setDatefin(new \DateTime($req->get('f')));

        $contratsponsoring->setType($req->get('t'));
        $contratsponsoring->setEtat($req->get('e'));

        $contratsponsoring->setSalairedt($req->get('s'));

        $entityManager->persist($contratsponsoring);
        $entityManager->flush();

        $jsonContent = $Normalizer->normalize($contratsponsoring, 'json', ['groups' => "contratsponsoring"]);
        return new Response(json_encode($jsonContent));
    }

    //supprimer un contrat
    // http://127.0.0.1:8000/contratsponsoring/mobileDelete/64
    #[Route('/mobileDelete/{id}', name: 'app_contratsponsoring_DeleteMobile')]
    public function MobileDelete($id, Request $rq, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $contrat = $em->getRepository(Contratsponsoring::class)->find($id);

        $em->remove($contrat);
        $em->flush();

        $jsonContent = $Normalizer->normalize($contrat, 'json', ['groups' => "contratsponsoring"]);
        return new Response("Contrat Sponsoring supprimé avec succès" . json_encode($jsonContent));
    }

    ////////////////////////////////////////////////////////////////////

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
    //********************************************************************
    //Nom Signature Signature - idCurrentUser */
    #[Route('/save-signature', name: 'save_signature', methods: ['POST'])]
    public function saveSignatureAction(Request $request, SessionInterface $session)
    {
        $user = $session->get('user');
        $idUser = $user->getIdUser();
        // Get the signatureDataURL parameter from the AJAX request
        $signatureDataURL = $request->request->get('signatureDataURL');
        // var_dump($signatureDataURL);

        // remove the "data:image/png;base64," prefix from the data URL
        // $dataURL = str_replace("data:image/png;base64,", "", $signatureDataURL);
        $dataURL = substr($signatureDataURL, 22);
        $dataURL = str_replace(' ', '+', $dataURL);

        $decoded = "";
        $block_size = 256; // initial block size
        $length = strlen($dataURL);
        for ($i = 0; $i < $length; $i += $block_size) {
            $chunk = substr($dataURL, $i, $block_size);
            $decoded .= base64_decode($chunk);
            $new_block_size = ceil(strlen($chunk) / 4) * 4; // next block size
            if ($new_block_size > $block_size) {
                $block_size = $new_block_size;
            }
        }

        // var_dump($dataURL);
        // decode the base64-encoded image data
        // $imageData = base64_decode($dataURL);
        // create an image resource from the decoded data
        $imageResource = imagecreatefromstring($decoded);
        // save the image to a file
        // header('Content-Type: image/png');
        imagesavealpha($imageResource, true);
        imagepng(
            $imageResource,
            'C:/xampp/htdocs/myjcc/contrats/signatures/Signature' . $idUser . '.png'
        );
        if (!$imageResource) {
            die('Failed to create image resource');
        }
        // clean up
        imagedestroy($imageResource);

        // Return a response to the AJAX request
        return new JsonResponse(['status' => 'success']);
    }
    #[Route('/new', name: 'app_contratsponsoring_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContratsponsoringRepository $contratsponsoringRepository, PdfGenerator $pdfGenerator, SessionInterface $session): Response
    {
        $contratsponsoring = new Contratsponsoring();
        $contratsponsoring->setSignaturephotographe("-");
        $contratsponsoring->setSignaturesponsor("-");
        $form = $this->createForm(ContratsponsoringType::class, $contratsponsoring);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $session->get('user');
            $idUser = $user->getIdUser();
            //récupérer la signature
            $contratsponsoring->setSignaturesponsor("http://localhost/myjcc/contrats/signatures/Signature" . $idUser . '.png');

            //$contratsponsoringRepository->findAll()
            $entityManager = $this->getDoctrine()->getManager();
            $sponsor = new User();
            $sponsor = $entityManager->getRepository(User::class)->findOneBy(['idUser' => $contratsponsoring->getIdSponsor()]);
            $photographe = new User();
            $photographe = $entityManager->getRepository(User::class)->findOneBy(['idUser' => $contratsponsoring->getIdPhotographe()]);
            // Load the image file
            // $imagePath = $contratsponsoring->get();
            // $image = new File($imagePath);

            // // Convert the image to base64
            // $imageData = base64_encode(file_get_contents($image));
            // le nom du contrat
            $currentDate = new DateTime();
            $timestamp = $currentDate->format('YmdHisu'); // format the date as YYYYmmddHHiiSSuuu
            //creation du contrat
            $pdfContent = $pdfGenerator->generatePdf($contratsponsoring, $sponsor, $photographe, "contrat-" . $timestamp . ".pdf");

            $contratsponsoring->setTermespdf("http://localhost/myjcc/contrats/" . "contrat-" . $timestamp . ".pdf");

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
    public function edit(Request $request, Contratsponsoring $contratsponsoring, ContratsponsoringRepository $contratsponsoringRepository, PdfGenerator $pdfGenerator, SessionInterface $session): Response
    {
        $contratsponsoring->setSignaturephotographe("-");
        $form = $this->createForm(ContratsponsoringType::class, $contratsponsoring);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $session->get('user');
            $idUser = $user->getIdUser();
            //récupérer la signature
            $contratsponsoring->setSignaturephotographe("http://localhost/myjcc/contrats/signatures/Signature" . $idUser . '.png');

            $entityManager = $this->getDoctrine()->getManager();
            $sponsor = new User();
            $sponsor = $entityManager->getRepository(User::class)->findOneBy(['idUser' => $contratsponsoring->getIdSponsor()]);
            $photographe = new User();
            $photographe = $entityManager->getRepository(User::class)->findOneBy(['idUser' => $contratsponsoring->getIdPhotographe()]);

            $currentDate = new DateTime();
            $timestamp = $currentDate->format('YmdHisu'); // format the date as YYYYmmddHHiiSSuuu
            //creation du contrat
            $pdfContent = $pdfGenerator->generatePdf($contratsponsoring, $sponsor, $photographe, "contrat-" . $timestamp . ".pdf");

            $contratsponsoring->setTermespdf("http://localhost/myjcc/contrats/" . "contrat-" . $timestamp . ".pdf");

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
