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


}
