<?php

namespace App\Controller;

use App\Entity\Planningfilmsalle;
use App\Form\PlanningfilmsalleType;
use App\Repository\PLanningfilmsalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/new', name: 'app_planningfilmsalle_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PLanningfilmsalleRepository $pLanningfilmsalleRepository): Response
    {
        $planningfilmsalle = new Planningfilmsalle();
        $form = $this->createForm(PlanningfilmsalleType::class, $planningfilmsalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pLanningfilmsalleRepository->save($planningfilmsalle, true);

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
    public function delete(Request $request, Planningfilmsalle $planningfilmsalle, PLanningfilmsalleRepository $pLanningfilmsalleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planningfilmsalle->getIdPlanning(), $request->request->get('_token'))) {
            $pLanningfilmsalleRepository->remove($planningfilmsalle, true);
        }

        return $this->redirectToRoute('app_planningfilmsalle_index', [], Response::HTTP_SEE_OTHER);
    }
}
