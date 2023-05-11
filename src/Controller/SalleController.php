<?php

namespace App\Controller;

use App\Entity\Salle;
use App\Form\SalleType;
use App\Repository\SalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;



#[Route('/salle')]
class SalleController extends AbstractController
{
    ////////////////////////////////////////////////
    // http://127.0.0.1:8000/salle/sallemobile
    #[Route('/sallemobile', name: 'app_salle_index_mobile', methods: ['GET'])]
    public function index_sallemobile(SalleRepository $salleRepository, SerializerInterface $serializer): Response
    {

        $salles = $salleRepository->findAll();
        $json = $serializer->serialize($salles, 'json', ['groups' => "reservation"]);

        return new Response($json);
    }
    //http://127.0.0.1:8000/salle/sallemobileshow/2
    #[Route('/sallemobileshow/{idSalle}', name: 'app_salle_show_mobile', methods: ['GET'])]
    public function salleMobileshow(Salle $salle, SerializerInterface $serializer)
    {
        $json = $serializer->serialize($salle, 'json', ['groups' => "reservation"]);

        return new Response($json);
    }

    // http://127.0.0.1:8000/salle/mobileNew?nom=test&adresse=tunis&capacite=100&num=20000000&email=lapalace@gmail.com&tempsouv=9&tempsfer=22&avis=3
    #[Route('/mobileNew', name: 'app_salle_newMobile')]
    public function Mobilenew(Request $rq, NormalizerInterface $Normalizer)
    {


        $em = $this->getDoctrine()->getManager();
        $salle = new Salle();

        $salle->setNomsalle($rq->get('nom'));
        $salle->setAdresse($rq->get('adresse'));
        $salle->setCapacite($rq->get('capacite'));
        $salle->setNumtelSalle($rq->get('num'));
        $salle->setEmailSalle($rq->get('email'));
        $salle->setTempsOuverture($rq->get('tempsouv'));
        $salle->setTempsFermuture($rq->get('tempsfer'));
        $salle->setAvis($rq->get('avis'));


        $em->persist($salle);
        $em->flush();

        $jsonContent = $Normalizer->normalize($salle, 'json', ['groups' => "reservation"]);
        return new Response(json_encode($jsonContent));
    }
    // http://127.0.0.1:8000/salle/mobileUpdate/7?nom=test12345&adresse=tunis&capacite=100&num=20000000&email=lapalace@gmail.com&tempsouv=9&tempsfer=22&avis=3
    #[Route('/mobileUpdate/{id}', name: 'app_salle_updateMobile')]
    public function Mobileupdate($id, Request $rq, NormalizerInterface $Normalizer)
    {


        $em = $this->getDoctrine()->getManager();
        $salle = $em->getRepository(Salle::class)->find($id);

        $salle->setNomsalle($rq->get('nom'));
        $salle->setAdresse($rq->get('adresse'));
        $salle->setCapacite($rq->get('capacite'));
        $salle->setNumtelSalle($rq->get('num'));
        $salle->setEmailSalle($rq->get('email'));
        $salle->setTempsOuverture($rq->get('tempsouv'));
        $salle->setTempsFermuture($rq->get('tempsfer'));
        $salle->setAvis($rq->get('avis'));


        $em->persist($salle);
        $em->flush();

        $jsonContent = $Normalizer->normalize($salle, 'json', ['groups' => "reservation"]);
        return new Response(json_encode($jsonContent));
    }
    // http://127.0.0.1:8000/salle/mobileDelete/7
    #[Route('/mobileDelete/{id}', name: 'app_salle_DeleteMobile')]
    public function MobileDelete($id, Request $rq, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $salle = $em->getRepository(Salle::class)->find($id);

        $em->remove($salle);
        $em->flush();

        $jsonContent = $Normalizer->normalize($salle, 'json', ['groups' => "reservation"]);
        return new Response("salle supprimé avec succès" . json_encode($jsonContent));
    }










    /////////////////////////////////////////////////
    #[Route('/', name: 'app_salle_index', methods: ['GET'])]
    public function index(SalleRepository $salleRepository): Response
    {
        return $this->render('salle/index.html.twig', [
            'salles' => $salleRepository->findAll(),
        ]);
    }
    #[Route('/salle_user', name: 'app_salle_index_user', methods: ['GET'])]
    public function index_user(SalleRepository $salleRepository): Response
    {
        return $this->render('salle/index.html copy.twig', [
            'salles' => $salleRepository->findAll(),
        ]);
    }


    #[Route('/new', name: 'app_salle_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SalleRepository $salleRepository): Response
    {
        $salle = new Salle();
        $form = $this->createForm(SalleType::class, $salle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salleRepository->save($salle, true);

            return $this->redirectToRoute('app_salle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('salle/new.html.twig', [
            'salle' => $salle,
            'form' => $form,
        ]);
    }

    #[Route('/{idSalle}', name: 'app_salle_show', methods: ['GET'])]
    public function show(Salle $salle): Response
    {
        return $this->render('salle/show.html.twig', [
            'salle' => $salle,
        ]);
    }
    #[Route('/{idSalle}/det', name: 'app_salle_show_user', methods: ['GET'])]
    public function show_user(Salle $salle): Response
    {
        return $this->render('salle/show.html copy.twig', [
            'salle' => $salle,
        ]);
    }

    #[Route('/{idSalle}/edit', name: 'app_salle_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Salle $salle, SalleRepository $salleRepository): Response
    {
        $form = $this->createForm(SalleType::class, $salle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salleRepository->save($salle, true);

            return $this->redirectToRoute('app_salle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('salle/edit.html.twig', [
            'salle' => $salle,
            'form' => $form,
        ]);
    }

    #[Route('/{idSalle}', name: 'app_salle_delete', methods: ['POST'])]
    public function delete(Request $request, Salle $salle, SalleRepository $salleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $salle->getIdSalle(), $request->request->get('_token'))) {
            $salleRepository->remove($salle, true);
        }

        return $this->redirectToRoute('app_salle_index', [], Response::HTTP_SEE_OTHER);
    }
}
