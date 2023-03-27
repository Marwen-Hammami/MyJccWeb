<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Form\HotelType;
use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
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
    public function createHotel (ManagerRegistry $doctrine, Request $request): Response
    {
        $hotel = new Hotel();
        $form =$this->createForm(HotelType::class, $hotel);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $EM = $doctrine->getManager();
            $EM->persist($hotel);
            $EM->flush();
            return $this->redirectToRoute('app_hotel');
        }
        $cancelButtonClicked = isset($request->request->get('hotel')['cancel']);

        if ($cancelButtonClicked) {
            return $this->redirectToRoute('app_hotel');
        }

     return $this->render('hotel/CreateHotel.html.twig',[
        'hotel' => $hotel,
        'form' => $form->createView(),
     ])   ;
    }  

    #[Route('/hotel/{id}', name: 'hotel_show')]
    public function getHotelByID(Hotel $hotel): Response
    {
        return $this->render('hotel/show.html.twig', [
            'hotel' => $hotel,
        ]);
    }
    
    #[Route('/hotels', name: 'hotel_index')]
    public function getAllHotels(HotelRepository $repo): Response
    {
        $list = $repo->findAll();
        return $this ->render('hotel/getAllHotels.html.twig', [
            'controller_name' => 'HotelRepository',
            'list' => $list,  
        ]);
    }

}
