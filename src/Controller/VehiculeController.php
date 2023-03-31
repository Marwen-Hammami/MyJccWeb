<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehiculeController extends AbstractController
{
    #[Route('/vehicule', name: 'app_vehicule')]
    public function index(): Response
    {
        return $this->render('vehicule/index.html.twig', [
            'controller_name' => 'VehiculeController',
        ]);
    }

    #[Route('/vehicule/create', name: 'create_vehicule')]
    public function createVehicule(ManagerRegistry $doctrine, Request $request): Response
    {
        $vehicule = new Vehicule();
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $EM = $doctrine->getManager();
            $EM->persist($vehicule);
            $EM->flush();
            return $this->redirectToRoute('app_vehicule');
        }
        $cancelButtonClicked = isset($request->request->get('vehicule')['cancel']);

        if ($cancelButtonClicked) {
            return $this->redirectToRoute('app_vehicule');
        }

        return $this->render('vehicule/CreateVehicule.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/vehicule/{matricule}', name: 'vehicule_show')]
    public function getVehiculelByMatricule($matricule, VehiculeRepository $repo)
    {
        $vehicule = $repo->find($matricule);
        $data = [
            'matricule' => $vehicule->getMatricule (),
            'type' => $vehicule->getType (),
            'marque' => $vehicule->getMarque(),
            'couleur' => $vehicule->getCouleur(),
        ];
        return new JsonResponse($data);
    }

    #[Route('/vehicules', name: 'vehicule_index')]
    public function getAllVehicules(VehiculeRepository $repo): Response
    {
        $list = $repo->findAll();
        return $this->render('vehicule/getAllVehicules.html.twig', [
            'controller_name' => 'VehiculeRepository',
            'list' => $list,
        ]);
    }

    #[Route('/vehicule/delete/{matricule}', name: 'vehicule_delete')]
    public function DeleteVehicule(VehiculeRepository $repo, ManagerRegistry $doctrine, $matricule): Response
    {
        $objet = $repo->find($matricule);
        $em = $doctrine->getManager();
        $em->remove($objet);
        $em->flush();
        return  $this->redirectToRoute('vehicule_index');
    }
    #[Route('/vehicule/update/{matricule}', name: 'update_vehicule')]
    public function updateVehicule(ManagerRegistry $doctrine, Request $request, $matricule, VehiculeRepository $repo)
    {
        $vehicule = $repo->find($matricule);
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('vehicule_index');
        }else{
        return $this->render('vehicule/ModifierVehicule.html.twig', [
            'form' => $form->createView(),
        ]);
        }
    }
}
