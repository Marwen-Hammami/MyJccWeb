<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Form\HotelType;
use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;

class HotelController extends AbstractController
{
    #[Route('/hotel', name: 'app_hotel')]
    public function index(): Response
    {
        return $this->render('hotel/index.html.twig', [
            'controller_name' => 'HotelController',
        ]);
    }

    #[Route('/hotel/create', name: 'create_hotel')]
    public function createHotel(ManagerRegistry $doctrine, Request $request): Response
    {
        $hotel = new Hotel();
        $form = $this->createForm(HotelType::class, $hotel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $EM = $doctrine->getManager();
            $EM->persist($hotel);
            $EM->flush();
            return $this->redirectToRoute('app_hotel');
        }
        $cancelButtonClicked = isset($request->request->get('hotel')['cancel']);

        if ($cancelButtonClicked) {
            return $this->redirectToRoute('app_hotel');
        }

        return $this->render('hotel/CreateHotel.html.twig', [
            'hotel' => $hotel,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/hotel/{id}', name: 'hotel_show')]
    public function getHotelByID($id, HotelRepository $repo)
    {
        $hotel = $repo->find($id);
        $data = [
            'libelle' => $hotel->getLibelle(),
            'adresse' => $hotel->getAdresse(),
            'nbreChambres' => $hotel->getNbreChambres(),
            'telephone' => $hotel->getTelephone(),
            'description' => $hotel->getDescription(),
        ];
        return new JsonResponse($data);
    }



    #[Route('/hotels', name: 'hotel_index')]
    public function getAllHotels(HotelRepository $repo): Response
    {
        $list = $repo->findAll();
        return $this->render('hotel/getAllHotels.html.twig', [
            'controller_name' => 'HotelRepository',
            'list' => $list,
        ]);
    }

    #[Route('/hotel/delete/{id}', name: 'hotel_delete')]
    public function DeleteHotel(HotelRepository $repo, ManagerRegistry $doctrine, $id): Response
    {
        $objet = $repo->find($id);
        $em = $doctrine->getManager();
        $em->remove($objet);
        $em->flush();
        return  $this->redirectToRoute('hotel_index');
    }

    #[Route('/hotel/update/{id}', name: 'update_hotel')]
    public function updateHotel(ManagerRegistry $doctrine, Request $request, $id, HotelRepository $repo)
    {
        $hotel = $repo->find($id);
        $form = $this->createForm(HotelType::class, $hotel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('hotel_index');
        }else{
        return $this->render('hotel/ModifierHotel.html.twig', [
            'form' => $form->createView(),
        ]);
        }
    }
}
