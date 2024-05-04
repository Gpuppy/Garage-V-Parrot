<?php

namespace App\Controller;

use App\Entity\Home;
use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReviewController extends AbstractController
{


    public function __construct(private readonly EntitymanagerInterface $entityManager)
    {

    }
    #[Route('/review', name: 'review/index.html.twig')]
    public function index(Request $request, EntityManagerInterface $manager, ReviewRepository $reviewRepository): Response
    {
        //$reviews = $reviewRepository->findReviews();
        $review = new Review();
        $form = $this->createForm(ReviewType::class, $review );
        $form->handleRequest($request);
        $form->isSubmitted(); // RETURNS FALSE!!!

        if($form->isSubmitted() && $form->isValid()){
            $review = $form->getData();
            //$reviewRepository->persistReview($review, null);

            $manager->persist($review);
            $manager->flush();


            $this->addFlash('success', 'Votre avis nous a bien été envoyé merci! :) ');

            return $this->redirectToRoute('review/index.html.twig');
        }
        return $this->render('review/index.html.twig', [
            'controller_name' => 'ReviewController',
            'form' => $form->createView(),
            'reviews' => $review
        ]);
    }

    #[Route('/reviews', name: 'event_show')]
    public function show(/*Review $review,EntityManagerInterface $manager*/ ) : Response
    {
        $reviews = $this->entityManager->getRepository(Review::class)->findAll();
        return $this->render('review/reviews.html.twig',[
            'reviews' => $reviews
        ]);

    }



}

