<?php

namespace App\Controller;

use App\Entity\Home;

use App\Entity\OpeningHours;
use App\Entity\Review;
use App\Form\ReviewType;
//use http\Env\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(private readonly EntitymanagerInterface $entityManager)
    {

    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);

    }

    #[Route('/horaires', name: 'app_opening_hours')]
    public function show(Request $request, EntityManagerInterface $manager) : Response
    {
        $OpeningHours = $this->entityManager->getRepository(OpeningHours::class)->findAll();
        return $this->render('opening_hours/index.html.twig', [
            'OpeningHours' => $OpeningHours
        ]);
    }

    ##[Route('/reviews', name: 'event_show')]
    #public function show(/*Review $review,EntityManagerInterface $manager*/ ) : Response
    /*{
        $reviews = $this->entityManager->getRepository(Review::class)->findAll();
        return $this->render('review/reviews.html.twig', [
            'reviews' => $reviews
        ]);
    }*/

    /*public function show(Request $request, EntityManagerInterface $manager) : Response
    {
        $review = new Review();
        $form = $this->createForm(ReviewType::class, $review );
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $review = $form->getData();
            //$reviewService->persistReview($review, null);

            $manager->persist($review);
            $manager->flush();


            $this->addFlash('success', 'Votre avis nous a bien été envoyé merci! :) ');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('home/index.html.twig',[
            //'home' => $home,
            'form' => $form->createView(),
        ]);
    }*/
}
