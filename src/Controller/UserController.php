<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Form\UserType;
use App\Repository\UserRepository;
use ContainerD9QKM0x\getSendmailControllerService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/user')]
class UserController extends AbstractController
{

    //Routes for Code name One //////////////////////////////////////////

    //afficher toutes les contarts
    // http://127.0.0.1:8000/user/mobileAll
    #[Route('/mobileAll', name: 'app_users_mobile_index')]
    public function indexMobile(UserRepository $contratRepository, SerializerInterface $serializer)
    {
        $contrats = $contratRepository->findAll();

        $json = $serializer->serialize($contrats, 'json', ['groups' => "contratsponsoring"]);

        return new Response($json);
    }

    //afficher un user
    // http://127.0.0.1:8000/user/Mobilelogin?email=tounsisamir@yahoo.fr
    #[Route('/Mobilelogin', name: 'app_mobileLogin_mobile_index_sponsor')]
    public function indexMobileSponsor(Request $req, SerializerInterface $serializer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $contrats = $entityManager->getRepository(User::class)->findBy(['email' => $req->get('email')]);

        $json = $serializer->serialize($contrats, 'json', ['groups' => "contratsponsoring"]);

        return new Response($json);
    }

    ///////////////////////////////////////////////////


    #[Route('/listuser', name: 'app_user')]
    public function indexAdmin(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }


    #[Route('/{idUser}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{idUser}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(ManagerRegistry $doctrine, Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);
            // $user->setMotdepasse($this->passwordEncoder->hashPassword($user, $user->getMotdepasse()));
            $em = $doctrine->getManager();
            $em->persist($user);

            $em->flush();
            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{idUser}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getidUser(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('block/{idUser}', name: 'block')]
    public function blockUser(Request $request, User $user, ManagerRegistry $doctrine)
    {
        //$user->setBlocked(true);
        $em = $doctrine->getManager();
        $em->persist($user);

        $this->addFlash('success', 'User blocked.');

        return $this->redirectToRoute('app_user');
    }
}
