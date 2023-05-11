<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use App\Repository\PLanningfilmsalleRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/reservation')]
class ReservationController extends AbstractController
{
    ////////////////////////////////////////////////
    // http://127.0.0.1:8000/reservation/reservationsmobile
    #[Route('/reservationsmobile', name: 'app_res_index_mobile', methods: ['GET'])]
    public function index_resmobile(ReservationRepository $reservationRepository, SerializerInterface $serializer): Response
    {

        $reservations = $reservationRepository->findAll();
        $json = $serializer->serialize($reservations, 'json', ['groups' => "reservation"]);

        return new Response($json);
    }
    //http://127.0.0.1:8000/reservation/reservationmobileshow/9
    #[Route('/reservationmobileshow/{idRes}', name: 'app_reservation_show_mobile', methods: ['GET'])]
    public function reservationMobileshow(Reservation $reservation, SerializerInterface $serializer)
    {
        $json = $serializer->serialize($reservation, 'json', ['groups' => "reservation"]);

        return new Response($json);
    }
    // http://127.0.0.1:8000/reservation/mobileNew?idplan=22&idUser=696
    #[Route('/mobileNew', name: 'app_reservation_newMobile')]
    public function Mobilenew(UserRepository $repository, PLanningfilmsalleRepository $planningrepo, Request $rq, NormalizerInterface $Normalizer)
    {

        $planning = $planningrepo->find($rq->get('idplan'));

        $em = $this->getDoctrine()->getManager();
        $reservation = new Reservation();

        $reservation->setIdPlan($planning);
        $reservation->setIdUser($rq->get('idUser'));

        $em->persist($reservation);
        $em->flush();

        $jsonContent = $Normalizer->normalize($reservation, 'json', ['groups' => "reservation"]);
        return new Response(json_encode($jsonContent));
    }
    // http://127.0.0.1:8000/reservation/mobileupdate/11?idplan=22&idUser=700
    #[Route('/mobileupdate/{id}', name: 'app_reservation_updateMobile')]
    public function Mobileupdate($id, UserRepository $repository, PLanningfilmsalleRepository $planningrepo, Request $rq, NormalizerInterface $Normalizer)
    {

        $planning = $planningrepo->find($rq->get('idplan'));

        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository(Reservation::class)->find($id);

        $reservation->setIdPlan($planning);
        $reservation->setIdUser($rq->get('idUser'));

        $em->persist($reservation);
        $em->flush();

        $jsonContent = $Normalizer->normalize($reservation, 'json', ['groups' => "reservation"]);
        return new Response(json_encode($jsonContent));
    }
    // http://127.0.0.1:8000/reservation/mobileDelete/11
    #[Route('/mobileDelete/{id}', name: 'app_reservation_DeleteMobile')]
    public function MobileDelete($id, Request $rq, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository(Reservation::class)->find($id);

        $em->remove($reservation);
        $em->flush();

        $jsonContent = $Normalizer->normalize($reservation, 'json', ['groups' => "reservation"]);
        return new Response("reservation supprimé avec succès" . json_encode($jsonContent));
    }







    /////////////////////////////////////////////////


    #[Route('/', name: 'app_reservation_index', methods: ['GET'])]
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReservationRepository $reservationRepository, SessionInterface $session): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $session->get('user');
            $idUser = $user->getIdUser();
            $reservationRepository->save($reservation, true);

            return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{idRes}', name: 'app_reservation_show', methods: ['GET'])]
    public function show(Reservation $reservation): Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/{idRes}/edit', name: 'app_reservation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservation $reservation, ReservationRepository $reservationRepository): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationRepository->save($reservation, true);

            return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{idRes}', name: 'app_reservation_delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, ReservationRepository $reservationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $reservation->getIdRes(), $request->request->get('_token'))) {
            $reservationRepository->remove($reservation, true);
        }

        return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
}
