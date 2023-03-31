<?php

namespace App\Controller;

use App\Entity\ReservationHotel;
use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class ReservationHotelController extends AbstractController
{
    #[Route('/reservation/hotel', name: 'app_reservation_hotel')]
    public function index(): Response
    {
        return $this->render('reservation_hotel/index.html.twig', [
            'controller_name' => 'ReservationHotelController',
        ]);
    }

    #[Route('/reservationhotel/create', name: 'create_reservationhotel')]
    public function createHotel(ManagerRegistry $doctrine, Request $request): Response
    {
        $reservation = new ReservationHotel();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $EM = $doctrine->getManager();
            $EM->persist($reservation);
            $EM->flush();
            return $this->redirectToRoute('app_reservation_hotel');
        }
        $cancelButtonClicked = isset($request->request->get('reservation')['cancel']);

        if ($cancelButtonClicked) {
            return $this->redirectToRoute('app_reservation_hotel');
        }

        return $this->render('reservation_hotel/CreateReservation.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }

}
