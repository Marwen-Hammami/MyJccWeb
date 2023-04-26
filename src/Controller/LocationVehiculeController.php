<?php

namespace App\Controller;

use App\Entity\LocationVehicule;
use App\Entity\User;
use App\Form\LocationVehiculeType;
use App\Repository\LocationVehiculeRepository;
use App\Services\QrcodeService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twilio\Http\CurlClient;
use Twilio\Rest\Client;

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
    public function createLocationVehicule(ManagerRegistry $doctrine, Request $request,  QrcodeService $qrcodeService): Response
    {   
        $qrCode = null;
        $typeReservation="Location Vehicule";

        $locationVehicule = new LocationVehicule();
        $locationVehicule ->setDateReservation(new \DateTime());
        $locationVehicule->setQrpath('');
        $form = $this->createForm(LocationVehiculeType::class, $locationVehicule);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Générer le contenu du code QR
            $qrContent = $qrContent = sprintf("Nom d'utilisateur : %s\nDate de réservation : %s\nDate de début : %s\nDate de fin : %s\nVehicule : %s\nTarif total : %s", 
            $locationVehicule->getIdUser()->getNom(),
            $locationVehicule->getDatereservation()->format('Y-m-d H:i:s'),
            $locationVehicule->getDateDebut()->format('Y-m-d'),
            $locationVehicule->getDateFin()->format('Y-m-d'),
            $locationVehicule->getMatricule()->getMatricule(),
            $locationVehicule->getTariftotal()
            );

            $qrCode = $qrcodeService->qrcode($qrContent,$typeReservation);
            $locationVehicule->setQrpath($qrCode);

            $em = $doctrine->getManager();
            $em->persist($locationVehicule);
            $em->flush();
              // Envoyer un SMS pour confirmer la réservation   
              $to = '+21626360693' ;//$reservation->getIdUser()->getNumtel() ; // Numéro de téléphone du destinataire
              $message = 'Votre réservation a bien été enregistrée.';
              $account_sid = 'AC18f0474fed3312dea0aabb4161679485';
              $auth_token = '2fe4a4c730de99f6d64f31fc6b5b74c0';
              $twilio_number = '+12763303738';
              $curlOptions = array(
                  CURLOPT_SSL_VERIFYHOST => false,
                  CURLOPT_SSL_VERIFYPEER => false
              );
              $client = new Client($account_sid,$auth_token);
              $client->setHttpClient(new CurlClient($curlOptions));
              $client->messages->create('+21626360693',
              array(
                  'from' =>$twilio_number,
                  'body' =>$message
              )
              );
              echo'message envoyer' ;
            return $this->redirectToRoute('location_vehicule_index');
        }
        $cancelButtonClicked = isset($request->request->get('reservation')['cancel']);

        if ($cancelButtonClicked) {
            return $this->redirectToRoute('reservationhotel_index');
        }

        return $this->render('location_vehicule/createLocation.html.twig', [
            'form' => $form->createView(),
            'qrCode' => $qrCode
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

    #[Route('/location/{email}', name:'mes_locations')]
    public function GetReservation( string $email): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $userRepository = $this->getDoctrine()->getRepository(User::class);
        $user = $userRepository->findOneBy(['email' => $email]);
    
        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }
    
        $locations = $entityManager->createQueryBuilder()
        ->select('r')
        ->from('App\Entity\LocationVehicule', 'r')
        ->where('r.idUser = :userId')
        ->setParameter('userId', $user->getIdUser())
        ->getQuery()
        ->getResult();
    
        return $this->render('location_vehicule/index.html.twig', [
            'user' => $user,
            'locations' => $locations,
        ]);
    }
}
