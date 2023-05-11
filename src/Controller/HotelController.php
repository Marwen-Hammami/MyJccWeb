<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Form\HotelType;
use App\Repository\HotelRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class HotelController extends AbstractController
{
    //Routes for Code name One //////////////////////////////////////////

    //afficher toutes les contarts
    // http://127.0.0.1:8000/contratsponsoring/mobileAll
    #[Route('/mobileAllhotels', name: 'app_hotel_mobile_index')]
    public function indexMobile(HotelRepository $hotelRepository, SerializerInterface $serializer)
    {
        $hotels = $hotelRepository->findAll();

        $json = $serializer->serialize($hotels, 'json', ['groups' => "hotel"]);

        return new Response($json);
    }

        //afficher un hotel
    // http://127.0.0.1:8000/contratsponsoring/mobileDetails/1
    #[Route('/hotelmobileDetails/{idHotel}', name: 'app_hote_show_mobile', methods: ['GET'])]
    public function Mobileshow(HotelRepository $hotelRepository, SerializerInterface $serializer)
    {
        $json = $serializer->serialize($hotelRepository, 'json', ['groups' => "hotel"]);

        return new Response($json);
    }

        //supprimer un contrat
    // http://127.0.0.1:8000/mobileDelete/64
    #[Route('/mobileDeletehotel/{id}', name: 'app_contratsponsoring_DeleteMobile')]
    public function MobileDelete($id, Request $rq, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $hotel = $em->getRepository(Hotel::class)->find($id);

        $em->remove($hotel);
        $em->flush();

        $jsonContent = $Normalizer->normalize($hotel, 'json', ['groups' => "hotel"]);
        return new Response("hotel  supprimé avec succès" . json_encode($jsonContent));
    }

        //modifier une photographie
// http://127.0.0.1:8000/hotel/mobileUpdate/1?libelle=testNewLibelle&adresse=testNewAdresse&nbreChambres=10&telephone=12345678&description=testNewDescription
#[Route('/mobileUpdatehotel/{id}', name: 'app_hotel_UpdateMobile')]
public function MobileUpdate(HotelRepository $repository, $id, Request $rq, NormalizerInterface $Normalizer)
{
    // Récupérer l'objet Hotel à partir de l'id donnée
    $hotel = $repository->find($id);
    if (!$hotel) {
        throw $this->createNotFoundException('L\'hotel avec l\'id '.$id.' n\'existe pas.');
    }
    // Modifier les attributs de l'objet Hotel à partir des données envoyées en requête
    $hotel->setLibelle($rq->get('libelle'));
    $hotel->setAdresse($rq->get('adresse'));
    $hotel->setNbreChambres($rq->get('nbreChambres'));
    $hotel->setTelephone($rq->get('telephone'));
    $hotel->setDescription($rq->get('description'));
    // Sauvegarder les modifications
    $em = $this->getDoctrine()->getManager();
    $em->flush();
    // Retourner une réponse indiquant que l'objet a été modifié avec succès
    $jsonContent = $Normalizer->normalize($hotel, 'json', ['groups' => "hotel"]);
    return new Response("Hotel modifié avec succès" . json_encode($jsonContent));
}


//ajouttt hotel 
#[Route('/mobileNewhotel', name: 'app_hotel_newMobile')]
public function mobilenew( Request $rq, NormalizerInterface $Normalizer)
{
    $hotel = new Hotel();
    $entityManager = $this->getDoctrine()->getManager();
    $hotel->setLibelle($rq->get('libelle'));
    $hotel->setAdresse($rq->get('adresse'));
    $hotel->setNbreChambres($rq->get('nbreChambres'));
    $hotel->setTelephone($rq->get('telephone'));
    $hotel->setDescription($rq->get('description'));
        
    $entityManager->persist($hotel);
    $entityManager->flush();

    $jsonContent = $Normalizer->normalize($hotel, 'json', ['groups' => "hotel"]);
    return new Response(json_encode($jsonContent));

}


    ////////////////////////////////////////////////////////////////////


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
