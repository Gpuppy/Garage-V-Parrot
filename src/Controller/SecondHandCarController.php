<?php

namespace App\Controller;

use App\Entity\SecondHandCar;
use App\Form\SearchForm;
use App\Model\SearchData;
use App\Repository\SecondHandCarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        if($form->isSubmitted() && $form->isValid()) {
            /*$data->page = $request->query->*/

        }
        //dd($data);
        //$SecondHandCars = $this->entityManager->getRepository(SecondHandCar::class)->findAll();
        $secondHandCars = $secondHandCarRepository->findSearch($data);

        return $this->render('second_hand_car/index.html.twig', [
            'SecondHandCars' => $secondHandCars,
            'form' => $form->createView()
             /*'controller_name' => 'SecondHandCarController',*/
            //'SecondHandCars' => $SecondHandCars,
            //'form' => $form->createView()
        ]);
    }

    /*public function show(SecondHandCarRepository $repository, Request $request)
    {
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest();

        //$SecondHandCars = $this->entityManager->getRepository(SecondHandCar::class)->findAll();
        $SecondHandCars = $repository->findSearch();
        return $this->render('second_hand_car/index.html.twig', [
            /*'controller_name' => 'SecondHandCarController',*/
            /*'SecondHandCars' => $SecondHandCars,
            'form' => $form->createView()
        ]);
    }*/

}
