<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class TMPSessionController extends AbstractController
{
    #[Route('startSession/{email}', name: 'app_t_m_p_session_strat')]
    public function index(Request $request, string $email, SessionInterface $session): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        if (!$user) {
            throw $this->createNotFoundException('User not found with email ' . $email);
        } else {
            $session->start();
            $session->set('user', $user);
            if ($user->getRole() === 'ADMINSTRATEUR') {
                return $this->render('templateBackOffice/homePage.html.twig', [
                    'controller_name' => 'TMPSessionController',
                    'loggedIn' => "Vous étes bien connecté",
                ]);
            } else {
                return $this->render('templateFrontOffice/homePage.html.twig', [
                    'controller_name' => 'TMPSessionController',
                    'loggedIn' => "Vous étes bien connecté",
                ]);
            }
        }
    }

    #[Route('endSession/', name: 'app_t_m_p_session_loggOut')]
    public function loggOut(SessionInterface $session): Response
    {
        $session->invalidate();
        return $this->render('TMPLogin.html.twig', [
            'controller_name' => 'TMPSessionController',
            'loggedIn' => "Vous etes déconnecté",
        ]);
    }
}
