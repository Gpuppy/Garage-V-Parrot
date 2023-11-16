<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecondHandCarController extends AbstractController
{
    #[Route('/voiture', name: 'app_second_hand_car')]
    public function index(): Response
    {
        return $this->render('second_hand_car/index.html.twig', [
            'controller_name' => 'SecondHandCarController',
        ]);
    }
}
