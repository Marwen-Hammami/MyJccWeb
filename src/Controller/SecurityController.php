<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\logintype;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Exception\LockedException;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;


class SecurityController extends AbstractController
{
    #[Route('/inscription', name: 'security_registration')]
    public function new(ManagerRegistry $doctrine, Request $request, SluggerInterface $slugger, UserRepository $userRepository): Response
    {
        $user = new User();
        $repository = $doctrine->getRepository(User::class);
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //  $hash= $encoder->encodePassword($user,$user->getPassword());
            $imageFile = $form->get('photob64')->getData();
            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageFile->move(
                        $this->getParameter('Image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $user->setPhotob64($newFilename);
            }

            $user->setMotdepasse($user->getMotdepasse());
            $user->setRole('SPECTATEUR');
            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('user/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route(path: '/login2', name: 'app_login_')]

    public function login(AuthenticationUtils $authenticationUtils, Request $request, ManagerRegistry $doctrine, SessionInterface $SessionInterface): Response
    {
        $entityManager = $doctrine->getManager();
        $userRepository = $entityManager->getRepository(User::class);
        $User = new User();




        // Création du formulaire pour saisir les informations de l'offre
        $form = $this->createForm(logintype::class, $User);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Ajout des informations de l'offre et de l'utilisateur courant
            $user = $userRepository->findOneBy(['email' => ($form->get('email')->getData())]);

            if ($user != null) {
                if ($user->getPassword() == $form->get('password')->getData()) {
                    //            $request->getSession()->get('user')->user ou id;

                    $request->getSession()->set('user', $user);
                    if ($user->getRole() == "ADMINSTRATEUR") {
                        dd("ADMINSTRATEUR");
                    } else {

                        return $this->render('templateFrontOffice/homePage.html.twig');
                    }
                } else
                    return $this->render("security/login.html.twig", array("f" => $form));
            } else     return $this->render("security/login.html.twig", array("f" => $form));
        }
        return $this->render("security/login.html.twig", array("f" => $form));
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(Request $request): Response
    {

        $request->getSession()->set('user', []);
        return $this->render('security/login.html.twig');
    }


    #[Route('/sec/mobileAll', name: 'app_users_mobile_index')]
    public function indexMobile(UserRepository $userRepository, SerializerInterface $serializer)
    {
        $users = $userRepository->findAll();

        $json = $serializer->serialize($users, 'json', ['groups' => "users"]);

        return new Response($json);
    }

    //afficher une galerie
    // http://127.0.0.1:8000/mobileDetails/699
    #[Route('/sec/mobileDetails/{idUser}', name: 'app_user_show_mobile', methods: ['GET'])]
    public function Mobileshow(User $galerie, SerializerInterface $serializer)
    {
        $json = $serializer->serialize($galerie, 'json', ['groups' => "users"]);

        return new Response($json);
    }

    //ajouter une galerie
    // http://127.0.0.1:8000/galerie/mobileNew?nom=testNom&description=testDesc&color=#0000&idUser=734
    #[Route('/sec/mobileNew', name: 'app_galerie_newMobile')]
    public function Mobilenew(UserRepository $repository, ManagerRegistry $doctrine, Request $rq, NormalizerInterface $Normalizer)
    {
        //créer un objet user a partir de l id


        $user = new User();

        $nom = $rq->query->get("nom");
        $prenom = $rq->query->get("prenom");
        $numtel = $rq->query->get("numtel");
        $email = $rq->query->get("email");
        $password = $rq->query->get("passwordpasse");
        $genre = $rq->query->get("genre");
        $role = $rq->query->get("role");

        $em = $doctrine->getManager();
        $user->setPrenom($prenom);
        $user->setNom($nom);
        $user->setEmail($email);
        $user->setMotdepasse($password);
        $user->setGenre($genre);
        $user->setRole($role);
        $user->setNumtel($numtel);

        $em->persist($user);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer;
        $jsonContent = $Normalizer->normalize($user, 'json', ['groups' => "users"]);
        return new JsonResponse(json_encode($jsonContent));
    }

    //modifier user
    // %23 = #
    #[Route('/sec/mobileUpdate/{id}', name: 'app_galerie_UpdateMobile')]
    public function MobileUpdate(UserRepository $repository, $id, Request $rq, NormalizerInterface $Normalizer, ManagerRegistry $doctrine)
    {
        //créer un objet user a partir de l id
        $user = new User();
        $repository = $doctrine->getRepository(User::class);
        $em = $doctrine->getManager();
        $user = $repository->find($id);

        $user->setUsername($rq->get('nom'));
        $user->setUsername($rq->get('prenom'));
        $user->setUsername($rq->get('email'));
        $user->setUsername($rq->get('passwordpasse'));
        $user->setUsername($rq->get('genre'));
        $user->setUsername($rq->get('numtel'));
        $user->setUsername($rq->get('photob64'));

        $em->flush();

        $jsonContent = $Normalizer->normalize($user, 'json', ['groups' => "users"]);
        return new Response("Utilisateur modifié avec succès" . json_encode($jsonContent));
    }

    //supprimer une user
    // http://127.0.0.1:8000/galerie/mobileDelete/729
    #[Route('/sec/mobileDelete/{id}', name: 'app_galerie_DeleteMobile')]
    public function MobileDelete($id, Request $rq, NormalizerInterface $Normalizer, ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $user = $em->getRepository(User::class)->find($id);
        $em->remove($user);
        $em->flush();

        $jsonContent = $Normalizer->normalize($user, 'json', ['groups' => "users"]);
        return new Response("Utilisateur supprimé avec succès" . json_encode($jsonContent));
    }

    #[Route('/sec/mobile/signin', name: 'app_mob_login')]
    public function signinAction(Request $rq, UserRepository $repository, ManagerRegistry $doctrine)
    {
        $email = $rq->query->get("email");
        $password = $rq->query->get("password");
        $em = $doctrine->getManager();
        $user = $em->getRepository(User::class)->findOneBy(['email' => $email]);
        if ($user) {
            if (password_verify($password, $user->getPassword())) {
                $serializer = new Serializer([new ObjectNormalizer()]);
                $formatted = $serializer->normalize($user);
                return new JsonResponse($formatted);
            } else {
                return new Response("password not found");
            }
        } else {
            return new Response("user not found");
        }

        // $jsonContent = $Normalizer->normalize($galerie, 'json', ['groups' => "photographies"]);
        // return new Response("Galerie supprimé avec succès" . json_encode($jsonContent));
    }
}
