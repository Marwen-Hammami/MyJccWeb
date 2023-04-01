<?php

namespace App\Controller;

use App\Entity\LocationVehicule;
use App\Form\LocationVehiculeType;
use App\Repository\LocationVehiculeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationVehiculeController extends AbstractController
{
    #[Route('/locationvehicule', name: 'location_vehicule')]
    public function index(): Response
    {
        return $this->render('location_vehicule/index.html.twig', [
            'controller_name' => 'LocationVehiculeController',
        ]);
    }

    #[Route('/locationvehicule/create', name: 'create_location_vehicule')]
    public function createLocationVehicule(ManagerRegistry $doctrine, Request $request): Response
    {
        $locationVehicule = new LocationVehicule();
        $locationVehicule ->setDateReservation(new \DateTime());
        $locationVehicule->setQrpath('');
        $form = $this->createForm(LocationVehiculeType::class, $locationVehicule);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($locationVehicule);
            $em->flush();
            return $this->redirectToRoute('location_vehicule_index');
        }
        $cancelButtonClicked = isset($request->request->get('reservation')['cancel']);

        if ($cancelButtonClicked) {
            return $this->redirectToRoute('reservationhotel_index');
        }

        return $this->render('location_vehicule/createLocation.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/locationvehicule/{id}', name: 'location_vehicule_show')]
    public function getLocationVehiculeByID($id, LocationVehiculeRepository $repo)
    {
        $locationVehicule = $repo->find($id);
        $data = [
            'datereservation' => $locationVehicule->getDatereservation(),
            'dateDebut' => $locationVehicule->getDateDebut(),
            'dateFin' => $locationVehicule->getDateFin(),
            'tariftotal' => $locationVehicule->getTariftotal(),
            'qrpath' => $locationVehicule->getQrpath(),
            //'matricule' => $locationVehicule->getMatricule(),
           // 'idUser' => $locationVehicule->getIdUser(),
        ];
        return new JsonResponse($data);
    }

    #[Route('/locationvehicules', name: 'location_vehicule_index')]
    public function getAllLocationVehicules(LocationVehiculeRepository $repo): Response
    {
        $list = $repo->findAll();
        return $this->render('location_vehicule/getAllLocations.html.twig', [
            'controller_name' => 'LocationVehiculeController',
            'list' => $list,
        ]);
    }

    #[Route('/location_vehicule/delete/{id}', name: 'location_vehicule_delete')]
    public function deleteLocationVehicule(LocationVehiculeRepository $repo, ManagerRegistry $doctrine, $id): Response
    {
        $locationVehicule = $repo->find($id);
        $em = $doctrine->getManager();
        $em->remove($locationVehicule);
        $em->flush();
        return  $this->redirectToRoute('location_vehicule_index');
    }

    #[Route('/locationvehicule/update/{id}', name: 'update_locationvehicule')]
    public function updateLocationVehicule(ManagerRegistry $doctrine, Request $request, $id, LocationVehiculeRepository $repo)
    {
        $location = $repo->find($id);
        $form = $this->createForm(LocationVehiculeType::class, $location);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('locationvehicule_index');
        }

        return $this->render('location_vehicule/ModifierLocationVehicule.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
