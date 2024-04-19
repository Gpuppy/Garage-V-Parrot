<?php

namespace App\Controller;

use App\Entity\Home;

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
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);

    }

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
