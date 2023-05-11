<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CodeType;
use App\Form\MailingType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\String\Slugger\SluggerInterface;

class SendmailController extends AbstractController
{
    // #[Route('/sendmail', name: 'app_sendmail')]
    // public function sendEmail(Request $request, MailerInterface $mailer): Response
    // {
    //     $emailAddress = $request->get('emailAddress');
    //     dd($emailAddress);
    //     $user = $this->getUser();
    // //     if ($user instanceof \App\Entity\User) {
    // //     $UserEmail = $user->getEmail();
    // //    }

    //     $transport = Transport::fromDsn('smtp://myjcc2023@outlook.com:azertyuiop123!@smtp.office365.com:587');
    //     $mailer = new Mailer($transport);
    //     $email = (new Email());
    //     $email->from('myjcc2023@outlook.com');
    //     $email->to($emailAddress);
    //     $email->subject('Demo message using the Symfony Mailer library.');
    //     $email->text('This is the plain text body of the message.\nThanks,\nAdmin');
    //     $email->html('This is the HTML version of the message.<br>Example of inline image:<br><img src="cid:nature" width="200" height="200"><br>Thanks,<br>Admin');
    //     $mailer->send($email);
    //     return $this->render('security/mail.html.twig', [
    //         'controller_name' => 'SendmailController',
    //     ]);
    // }

    #[Route('/sendmail', name: 'app_sendmail')]
    public function sendEmail(ManagerRegistry $doctrine, Request $request, SluggerInterface $slugger, UserRepository $userRepository): Response
    {
        $user = new User();
        $repository = $doctrine->getRepository(User::class);
        $form = $this->createForm(MailingType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $userRepository->findOneBy(['email' => ($form->get('email')->getData())]);

            if ($user != null) {

                $randomNumber = random_int(10000, 99999);
                $request->getSession()->set('usercode', $randomNumber);



                $transport = Transport::fromDsn('smtp://myjcc2023@outlook.com:azertyuiop123!@smtp.office365.com:587');
                $mailer = new Mailer($transport);
                $email = (new Email());
                $email->from('myjcc2023@outlook.com');
                $email->to($user->getEmail());
                $email->subject('Réintialisation du mot de passe');
                $stringValue = (string) $randomNumber;
                $email->text($stringValue);
                // $email->html('This is the HTML version of the message.<br>Example of inline image:<br><img src="cid:nature" width="200" height="200"><br>Thanks,<br>Admin');
                $mailer->send($email);
                return $this->render('security/mail.html.twig', [
                    'controller_name' => 'SendmailController',
                ]);
            }

            //  $em = $doctrine->getManager();
            // $em->persist($user);
            //$em->flush();

        }
        return $this->renderForm('security/recoverPassword.html.twig', [
            "form" => $form
        ]);
    }
}

//     #[Route('/code', name: 'code')]
//     public function code(ManagerRegistry $doctrine ,Request $request, SluggerInterface $slugger ,UserRepository $userRepository): Response
//         {   $user= new User();
//             $repository= $doctrine->getRepository(User::class);
//             $form = $this->createForm(CodeType::class, $user);
//             $form->handleRequest($request);
    
//             if ($form->isSubmitted() && $form->isValid()) {
//                if( $request->getSession()->get('usercode')==$form->get('numtel')->getData()){

//                }


//         }   
// }
