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
use Symfony\Component\String\Slugger\SluggerInterface;

class SecurityController extends AbstractController
{
    #[Route('/inscription', name: 'security_registration')]
    public function new(ManagerRegistry $doctrine ,Request $request, SluggerInterface $slugger ,UserRepository $userRepository): Response
    {
        $user = new User();
        $repository= $doctrine->getRepository(User::class);
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
            $user->setPassword($user->getPassword());
            $user->setRole('SPECTATEUR');
            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('security/registration.html.twig',[
        'form' => $form->createView()
        ]);
    }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils ,Request $request ,ManagerRegistry $doctrine,SessionInterface $SessionInterface ): Response
    {
        $entityManager = $doctrine->getManager();
        $userRepository = $entityManager->getRepository(User::class);
        $User = new User();
        // Récupération de l'utilisateur courant et de son ID
        
        // Création du formulaire pour saisir les informations de l'offre
        $form = $this->createForm(logintype::class, $User);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        // Ajout des informations de l'offre et de l'utilisateur courant
        $user=$userRepository->findOneBy(['email' =>($form->get('email')->getData())]);
        if($user!=null){
            if($user->getPassword()==$form->get('password')->getData()){
            //            $request->getSession()->get('user')->user ou id;

            $request->getSession()->set('user',$user);
            if($user->getRole()=="ADMINSTRATEUR")
            {dd("ADMINSTRATEUR");}
            else
            {dd("SPECTATEUR");}

        }
    else
    return $this->render("security/login.html.twig",array("f"=>$form));}
    else     return $this->render("security/login.html.twig",array("f"=>$form));

}
        return $this->render("security/login.html.twig",array("f"=>$form));
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): Response
    {
        return $this->render('security/login.html.twig');
    }
}
