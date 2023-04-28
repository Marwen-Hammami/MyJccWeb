<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Planningfilmsalle;
use App\Form\PlanningfilmsalleType;
use App\Repository\UserRepository;
use App\Repository\PLanningfilmsalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Message\PlanningCreatedMessage;
use App\Message\PlanningDeletedMessage;
use Symfony\Component\Messenger\MessageBusInterface;
use CalendarBundle\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;





#[Route('/planningfilmsalle')]
class PlanningfilmsalleController extends AbstractController
{
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
        $user = null;
if ($this->getUser() && $this->getUser()->isAuthenticated()) {
    $user = $userRepository->find($this->getUser()->getIdUser());
}

    
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
        if ($this->isCsrfTokenValid('delete'.$planningfilmsalle->getIdPlanning(), $request->request->get('_token'))) {
            $pLanningfilmsalleRepository->remove($planningfilmsalle, true);

            $bus->dispatch(new PlanningDeletedMessage($planningfilmsalle));
            $this->addFlash('success', 'The planning has been deleted successfully!');
        }

        return $this->redirectToRoute('app_planningfilmsalle_index', [], Response::HTTP_SEE_OTHER);
    }
}


    

