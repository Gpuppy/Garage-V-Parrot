<?php

namespace App\Controller;

use App\Entity\SecondHandCar;
use App\Form\SearchForm;
use App\Model\SearchData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecondHandCarController extends AbstractController
{
    public function __construct(private readonly EntitymanagerInterface $entityManager)
    {

    }

    #[Route('/SecondHandCar', name: 'app_second_hand_car')]
    public function index(): Response
    {
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $SecondHandCars = $this->entityManager->getRepository(SecondHandCar::class)->findAll();
        //$SecondHandCars = $repository->findSearch();
        return $this->render('second_hand_car/index.html.twig', [
            /*'controller_name' => 'SecondHandCarController',*/
            'SecondHandCars' => $SecondHandCars,
            'form' => $form->createView()
        ]);
    }
}
