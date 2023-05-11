<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Planningfilmsalle;
use App\Form\Film1Type;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;


#[Route('/film')]
class FilmController extends AbstractController
{


    ////////////////////////////////////////////////
    // http://127.0.0.1:8000/film/filmsmobile
    #[Route('/filmsmobile', name: 'app_film_index_mobile', methods: ['GET'])]
    public function index_filmmobile(FilmRepository $filmRepository, SerializerInterface $serializer): Response
    {
       
            $films = $filmRepository->findAll();
            $json = $serializer->serialize($films, 'json', ['groups' => "reservation"]);

             return new Response($json);
        
    }
    //http://127.0.0.1:8000/film/filmmobileshow/1
    #[Route('/filmmobileshow/{idFilm}', name: 'app_film_show_mobile', methods: ['GET'])]
    public function filmMobileshow(Film $film, SerializerInterface $serializer)
    {
        $json = $serializer->serialize($film, 'json', ['groups' => "reservation"]);

        return new Response($json);
    }

// http://127.0.0.1:8000/film/mobileNew?titre=testNom&genre=test$&date=2000&duree=1h&prix=12&prod=test&resume=test&acteur=test&image=http://localhost/myjcc/films/dachra.png
    #[Route('/mobileNew', name: 'app_film_newMobile')]
    public function Mobilenew(Request $rq, NormalizerInterface $Normalizer)
    {
        

        $em = $this->getDoctrine()->getManager();
        $film = new Film();

        $film->setTitre($rq->get('titre'));
        $film->setGenre($rq->get('genre'));
        $film->setResume($rq->get('resume'));
        $film->setDaterealisation($rq->get('date'));
        $film->setDuree($rq->get('duree'));
        $film->setPrix($rq->get('prix'));
        $film->setIdProducteur($rq->get('prod'));
        $film->setActeur($rq->get('acteur'));
        $film->setFilmimage($rq->get('image'));
    

        $em->persist($film);
        $em->flush();

        $jsonContent = $Normalizer->normalize($film, 'json', ['groups' => "reservation"]);
        return new Response(json_encode($jsonContent));
    }

    // http://127.0.0.1:8000/film/mobileupdate/24?titre=testNom12345&genre=test&resume=test$&date=2000&duree=1h&prix=12&prod=test&resume=test&acteur=test&image=http://localhost/myjcc/films/dachra.png
    #[Route('/mobileupdate/{id}', name: 'app_film_updateMobile')]
    public function Mobileupdate($id, Request $rq, NormalizerInterface $Normalizer)
    {
        

        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository(Film::class)->find($id);

        $film->setTitre($rq->get('titre'));
        $film->setGenre($rq->get('genre'));
        $film->setResume($rq->get('resume'));
        $film->setDaterealisation($rq->get('date'));
        $film->setDuree($rq->get('duree'));
        $film->setPrix($rq->get('prix'));
        $film->setIdProducteur($rq->get('prod'));
        $film->setActeur($rq->get('acteur'));
        $film->setFilmimage($rq->get('image'));
    

        $em->persist($film);
        $em->flush();

        $jsonContent = $Normalizer->normalize($film, 'json', ['groups' => "reservation"]);
        return new Response(json_encode($jsonContent));
    }

     // http://127.0.0.1:8000/film/mobileDelete/21
    #[Route('/mobileDelete/{id}', name: 'app_film_DeleteMobile')]
    public function MobileDelete($id, Request $rq, NormalizerInterface $Normalizer)
    {
        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository(Film::class)->find($id);

        $em->remove($film);
        $em->flush();

        $jsonContent = $Normalizer->normalize($film, 'json', ['groups' => "reservation"]);
        return new Response("film supprimé avec succès" . json_encode($jsonContent));
    }







    /////////////////////////////////////////////////
    #[Route('/', name: 'app_film_index', methods: ['GET'])]
    public function index(FilmRepository $filmRepository): Response
    {
        return $this->render('film/index.html.twig', [
            'films' => $filmRepository->findAll(),
        ]);
    }

    #[Route('/film_user', name: 'app_film_index_user', methods: ['GET'])]
    public function index_user(FilmRepository $filmRepository): Response
    {
        return $this->render('film/index.html.copy.twig', [
            'films' => $filmRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_film_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FilmRepository $filmRepository): Response
    {
        $film = new Film();
        $form = $this->createForm(Film1Type::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('filmimage')->getData();

            if ($uploadedFile) {
                $destination = 'C:\xampp\htdocs\myjcc\films'; // update this line   
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename ='http://localhost/myjcc/films/'.$originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $film->setFilmimage($newFilename);
            }

            $filmRepository->save($film, true);

            return $this->redirectToRoute('app_film_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('film/new.html.twig', [
            'film' => $film,
            'form' => $form,
        ]);
    }

    #[Route('/{idFilm}', name: 'app_film_show', methods: ['GET'])]
    public function show(Film $film): Response
    {
        return $this->render('film/show.html.twig', [
            'film' => $film,
        ]);
    }
    #[Route('/{idFilm}/det', name: 'app_film_show_user', methods: ['GET'])]
    public function show_user(Film $film): Response
    {
        $plannings = $this->getDoctrine()->getRepository(Planningfilmsalle::class)->findByFilm($film);

        return $this->render('film/show.html.copy.twig', [
            'film' => $film,
            'plannings' => $plannings,
        ]);
    }

    #[Route('/{idFilm}/edit', name: 'app_film_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Film $film, FilmRepository $filmRepository): Response
    {
        $form = $this->createForm(Film1Type::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('filmimage')->getData();

            if ($uploadedFile) {
                $destination = 'C:\xampp\htdocs\myjcc\films'; // update this line
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename ='http://localhost/myjcc/films/'.$originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $film->setFilmimage($newFilename);
            }

            $filmRepository->save($film, true);

            return $this->redirectToRoute('app_film_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('film/edit.html.twig', [
            'film' => $film,
            'form' => $form,
        ]);
    }
    #[Route('/{idFilm}', name: 'app_film_delete', methods: ['POST'])]
    public function delete(Request $request, Film $film, FilmRepository $filmRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$film->getIdFilm(), $request->request->get('_token'))) {
            $filmRepository->remove($film, true);
        }

        return $this->redirectToRoute('app_film_index', [], Response::HTTP_SEE_OTHER);
    }
}
