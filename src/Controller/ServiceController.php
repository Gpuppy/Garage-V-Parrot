<?php

namespace App\Controller;


use App\Entity\Service;
use AWS\CRT\HTTP\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    public function __construct(private readonly EntitymanagerInterface $entityManager)
    {

    }
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        $Services = $this->entityManager->getRepository(Service::class)->findAll();
        return $this->render('service/index.html.twig',[
           'Services' => $Services
           // dd('services')

        ]);

        /*return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
        ]);*/
    }



}
