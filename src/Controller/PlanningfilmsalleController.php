<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Planningfilmsalle;
use App\Form\PlanningfilmsalleType;
use App\Repository\UserRepository;
use App\Repository\PLanningfilmsalleRepository;
use App\Repository\FilmRepository;
use App\Repository\SalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Message\PlanningCreatedMessage;
use App\Message\PlanningDeletedMessage;
use Symfony\Component\Messenger\MessageBusInterface;
use CalendarBundle\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use DateTime;





#[Route('/planningfilmsalle')]
class PlanningfilmsalleController extends AbstractController
{


    ////////////////////////////////////////////////
    // http://127.0.0.1:8000/planningfilmsalle/planmobile
    #[Route('/planmobile', name: 'app_plan_index_mobile', methods: ['GET'])]
    public function index_planmobile(PLanningfilmsalleRepository $pLanningfilmsalleRepository, SerializerInterface $serializer): Response
    {

        $planningfilmsalles = $pLanningfilmsalleRepository->findAll();
        $json = $serializer->serialize($planningfilmsalles, 'json', ['groups' => "reservation"]);

        return new Response($json);
    }
    //http://127.0.0.1:8000/planningfilmsalle/planningmobileshow/6
    #[Route('/planningmobileshow/{idPlanning}', name: 'app_planning_show_mobile', methods: ['GET'])]
    public function planningMobileshow(Planningfilmsalle $planningfilmsalle, SerializerInterface $serializer)
    {
        $json = $serializer->serialize($planningfilmsalle, 'json', ['groups' => "reservation"]);

        return new Response($json);
    }
    //http://127.0.0.1:8000/planningfilmsalle/mobileNew?idfilm=1&idsalle=2&heure=19:00&date=12/05/2023
    #[Route('/mobileNew', name: 'app_planning_newMobile')]
    public function Mobilenew(FilmRepository $filmrepository, SalleRepository $sallerepository, Request $rq, NormalizerInterface $Normalizer)
    {

        $film = $filmrepository->find($rq->get('idfilm'));
        $salle = $sallerepository->find($rq->get('idsalle'));

        $em = $this->getDoctrine()->getManager();
        $planning = new Planningfilmsalle();

        $planning->setIdFilm($film);
        $planning->setIdSalle($salle);
        $planning->setHeurediffusion($rq->get('heure'));
        $date = DateTime::createFromFormat('d/m/Y', $rq->get('date'));
        $planning->setDatediffusion($date);

        $em->persist($planning);
        $em->flush();

        $jsonContent = $Normalizer->normalize($planning, 'json', ['groups' => "reservation"]);
        return new Response(json_encode($jsonContent));
    }

    //http://127.0.0.1:8000/planningfilmsalle/mobileupdate/23?idfilm=1&idsalle=2&heure=15:00&date=12/05/2023
    #[Route('/mobileupdate/{id}', name: 'app_planning_updateMobile')]
    public function Mobileupdate($id, FilmRepository $filmrepository, SalleRepository $sallerepository, Request $rq, NormalizerInterface $Normalizer)
    {

        $film = $filmrepository->find($rq->get('idfilm'));
        $salle = $sallerepository->find($rq->get('idsalle'));

        $em = $this->getDoctrine()->getManager();
        $planning = $em->getRepository(Planningfilmsalle::class)->find($id);

        $planning->setIdFilm($film);
        $planning->setIdSalle($salle);
        $planning->setHeurediffusion($rq->get('heure'));
        $date = DateTime::createFromFormat('d/m/Y', $rq->get('date'));
        $planning->setDatediffusion($date);

        $em->persist($planning);
        $em->flush();

        $jsonContent = $Normalizer->normalize($planning, 'json', ['groups' => "reservation"]);
        return new Response(json_encode($jsonContent));
    }

    // http://127.0.0.1:8000/planningfilmsalle/mobileDelete/23
    #[Route('/mobileDelete/{id}', name: 'app_planning_DeleteMobile')]
    public function MobileDelete($id, Request $rq, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $planning = $em->getRepository(Planningfilmsalle::class)->find($id);

        $em->remove($planning);
        $em->flush();

        $jsonContent = $Normalizer->normalize($planning, 'json', ['groups' => "reservation"]);
        return new Response("film supprimé avec succès" . json_encode($jsonContent));
    }







    /////////////////////////////////////////////////
    #[Route('/', name: 'app_planningfilmsalle_index', methods: ['GET'])]
    public function index(PLanningfilmsalleRepository $pLanningfilmsalleRepository): Response
    {
        return $this->render('planningfilmsalle/index.html.twig', [
            'planningfilmsalles' => $pLanningfilmsalleRepository->findAll(),
        ]);
    }
    #[Route('/plancal', name: 'app_planningfilmsalle_index_user', methods: ['GET'])]
    public function index_plan(PLanningfilmsalleRepository $pLanningfilmsalleRepository): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $plannings = $entityManager->getRepository(Planningfilmsalle::class)->findAll();


        $events = [];
        foreach ($plannings as $planning) {

            $start = new \DateTime($planning->getDatediffusion()->format('Y-m-d'));
            $end = (clone $start)->modify('+2 hours');


            $event = new Event(
                $planning->getIdFilm()->getTitre(),
                $start,
                $end
            );


            $events[] = $event;
        }


        return $this->render('planningfilmsalle/index.html copy.twig', [
            'events' => $events,
            'plannings' => $plannings
        ]);
    }

    #[Route('/new', name: 'app_planningfilmsalle_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PLanningfilmsalleRepository $pLanningfilmsalleRepository, MessageBusInterface $bus): Response
    {
        $planningfilmsalle = new Planningfilmsalle();
        $form = $this->createForm(PlanningfilmsalleType::class, $planningfilmsalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pLanningfilmsalleRepository->save($planningfilmsalle, true);

            $bus->dispatch(new PlanningCreatedMessage($planningfilmsalle));
            $this->addFlash('success', 'The planning has been created successfully!');

            return $this->redirectToRoute('app_planningfilmsalle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('planningfilmsalle/new.html.twig', [
            'planningfilmsalle' => $planningfilmsalle,
            'form' => $form,
        ]);
    }

    #[Route('/{idPlanning}', name: 'app_planningfilmsalle_show', methods: ['GET'])]
    public function show(Planningfilmsalle $planningfilmsalle): Response
    {
        return $this->render('planningfilmsalle/show.html.twig', [
            'planningfilmsalle' => $planningfilmsalle,
        ]);
    }

    #[Route('/{idPlanning}/user', name: 'app_planningfilmsalle_show_user', methods: ['GET'])]
    public function show_user(Planningfilmsalle $planningfilmsalle, UserRepository $userRepository): Response
    {
        $user = null;/*
        if ($this->getUser() && $this->getUser()->isAuthenticated()) {
            $user = $userRepository->find($this->getUser()->getIdUser());
        }*/


        return $this->render('planningfilmsalle/show.html copy.twig', [
            'planningfilmsalle' => $planningfilmsalle,
            'user' => $user,
        ]);
    }


    #[Route('/{idPlanning}/edit', name: 'app_planningfilmsalle_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Planningfilmsalle $planningfilmsalle, PLanningfilmsalleRepository $pLanningfilmsalleRepository): Response
    {
        $form = $this->createForm(PlanningfilmsalleType::class, $planningfilmsalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pLanningfilmsalleRepository->save($planningfilmsalle, true);

            return $this->redirectToRoute('app_planningfilmsalle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('planningfilmsalle/edit.html.twig', [
            'planningfilmsalle' => $planningfilmsalle,
            'form' => $form,
        ]);
    }

    #[Route('/{idPlanning}', name: 'app_planningfilmsalle_delete', methods: ['POST'])]
    public function delete(Request $request, Planningfilmsalle $planningfilmsalle, PLanningfilmsalleRepository $pLanningfilmsalleRepository, MessageBusInterface $bus): Response
    {
        if ($this->isCsrfTokenValid('delete' . $planningfilmsalle->getIdPlanning(), $request->request->get('_token'))) {
            $pLanningfilmsalleRepository->remove($planningfilmsalle, true);

            $bus->dispatch(new PlanningDeletedMessage($planningfilmsalle));
            $this->addFlash('success', 'The planning has been deleted successfully!');
        }

        return $this->redirectToRoute('app_planningfilmsalle_index', [], Response::HTTP_SEE_OTHER);
    }
}
