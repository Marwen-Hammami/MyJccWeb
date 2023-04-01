<?php

namespace App\Controller;

use App\Entity\ReservationHotel;
use App\Form\ReservationHotelType;
use App\Repository\HotelRepository;
use App\Repository\UserRepository;
use App\Repository\ReservationHotelRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ReservationHotelController extends AbstractController
{
    #[Route('/reservation/', name: 'app_reservation_hotel')]
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
        $reservation->setDateReservation(new \DateTime());
        $reservation->setQrpath('');
        $form = $this->createForm(ReservationHotelType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $EM = $doctrine->getManager();
            $EM->persist($reservation);
            $EM->flush();
            return $this->redirectToRoute('reservationhotel_index');
        }
        $cancelButtonClicked = isset($request->request->get('reservation')['cancel']);

        if ($cancelButtonClicked) {
            return $this->redirectToRoute('reservationhotel_index');
        }

        return $this->render('reservation_hotel/CreateReservation.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }
    #[Route('/reservationhotel/{id}', name: 'reservationhotel_show')]
    public function getReservationHotelByID($id, ReservationHotelRepository $repo, HotelRepository $hotelRepo, UserRepository $userRepo)
    {
        $reservation = $repo->find($id);
        
        $qb = $hotelRepo->createQueryBuilder('h');
        $qb->select('h.libelle')
           ->where('h.idHotel = :idHotel')
           ->setParameter('idHotel', $reservation->getIdHotel()->getIdHotel());
        $hotelName = $qb->getQuery()->getOneOrNullResult();
    
        $qb = $userRepo->createQueryBuilder('u');
        $qb->select('u.nom')
           ->where('u.id = :userId')
           ->setParameter('userId', $reservation->getIdUser()->getIdUser());
        $userName = $qb->getQuery()->getOneOrNullResult();
    
        $data = [
            'datereservation' => $reservation->getDatereservation(),
            'dateDebut' => $reservation->getDateDebut(),
            'dateFin' => $reservation->getDateFin(),
            'tariftotale' => $reservation->getTariftotale(),
            'qrpath' => $reservation->getQrpath(),
            'hotel' => $hotelName['libelle'],
            'user' => $userName['nom'],
        ];
        
        return new JsonResponse($data);
    }
    
    

    #[Route('/reservationhotels', name: 'reservationhotel_index')]
    public function getAllReservationHotels(ReservationHotelRepository $repo): Response
    {
        $list = $repo->findAll();
        return $this->render('reservation_hotel/getAllReservationHotels.html.twig', [
            'controller_name' => 'ReservationHotelRepository',
            'list' => $list,
        ]);
    }

    #[Route('/reservationhotel/delete/{id}', name: 'reservationhotel_delete')]
    public function DeleteReservationHotel(ReservationHotelRepository $repo, ManagerRegistry $doctrine, $id): Response
    {
        $objet = $repo->find($id);
        $em = $doctrine->getManager();
        $em->remove($objet);
        $em->flush();
        return  $this->redirectToRoute('reservationhotel_index');
    }

    #[Route('/reservationhotel/update/{id}', name: 'update_reservationhotel')]
    public function updateReservationHotel(ManagerRegistry $doctrine, Request $request, $id, ReservationHotelRepository $repo)
    {
        $reservation = $repo->find($id);
        $form = $this->createForm(ReservationHotelType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('reservationhotel_index');
        }else{
        return $this->render('reservation_hotel/ModifierReservationHotel.html.twig', [
            'form' => $form->createView(),
        ]);
        }
    }

}
