<?php

namespace App\Controller;


use App\Form\SearchForm;
use App\Model\SearchData;
use App\Repository\SecondHandCarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SecondHandCarController extends AbstractController
{
    public function __construct(private readonly EntitymanagerInterface $entityManager)
    {

    }

    ##[Route('/SecondHandCar', name: 'app_second_hand_car')]
    /*public function index(): Response
    {
        $SecondHandCars = $this->entityManager->getRepository(SecondHandCar::class)->findAll();
        return $this->render('second_hand_car/index.html.twig', [
            'controller_name' => 'SecondHandCarController',

            'SecondHandCars' => $SecondHandCars
        ]);
    }*/

    #[Route('/SecondHandCar', name: 'app_second_hand_car'/*, methods: ['GET']*/)]
    public function index(SecondHandCarRepository $secondHandCarRepository, Request $request) : Response
    {
        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        [$min, $max] = $secondHandCarRepository->findMinMax($data);
        $secondHandCars = $secondHandCarRepository->findSearch($data);
        if($request->isXmlHttpRequest()) {
            return new JsonResponse([
                'content' => $this->renderView('second_hand_car/_second_hand_cars.html.twig', ['SecondHandCars' => $secondHandCars]),
                'sorting' => $this->renderView('second_hand_car/_sorting.html.twig', ['SecondHandCars' => $secondHandCars])
            ]);
        }

        return $this->render('second_hand_car/index.html.twig', [
            'SecondHandCars' => $secondHandCars,
            'form' => $form->createView(),
             'min' => $min,
             'max' => $max
             /*'controller_name' => 'SecondHandCarController',*/
            //'SecondHandCars' => $SecondHandCars,

        ]);
    }



}
/*if($form->isSubmitted() && $form->isValid()) {*/
/*$data->page = $request->query->}*/
//dd($data);
//$SecondHandCars = $this->entityManager->getRepository(SecondHandCar::class)->findAll();