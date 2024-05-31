<?php

namespace App\Controller;

use App\Entity\OpeningHours;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpeningHoursController extends AbstractController
{
    public function __construct(private readonly EntitymanagerInterface $entityManager)
    {

    }

    #[Route('/horaires', name: 'app_opening_hours')]
    public function index(): Response
    {
        $OpeningHours = $this->entityManager->getRepository(OpeningHours::class)->findAll();
        return $this->render('opening_hours/index.html.twig', [
            'OpeningHours' => $OpeningHours
        ]);
    }
}

