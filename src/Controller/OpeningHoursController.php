<?php

namespace App\Controller;

use App\Entity\OpeningHours;
use App\Entity\SecondHandCar;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Request;
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


    public function addOpeningHours(Request $request, EntityManagerInterface $entityManager): Response
    {
        $openingHours = new OpeningHours();
        $form = $this->createForm(OpeningHoursType::class, $openingHours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Fetch the User (assuming it's the currently logged-in user)
            $user = $this->getUser(); // Ensure this is implemented correctly

            if (!$user) {
                throw new \Exception("User not found");
            }

            $openingHours->setUser($user); // Set the relationship
            $entityManager->persist($openingHours);
            $entityManager->flush();

            return $this->redirectToRoute('horaires'); // Update with your route
        }

        return $this->render('opening_hours/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}



/*$user = $entityManager->getRepository(User::class)->find($userId);
$openingHours->setUser($user); // Make sure to associate the User entity
$entityManager->persist($openingHours);
$entityManager->flush();

$user = $entityManager->getRepository(User::class)->find($userId);
if (!$user) {
    throw new \Exception("User not found!");
}

$openingHours = new OpeningHours();
$openingHours->setUser($user);
// Set other fields for OpeningHours
$entityManager->persist($openingHours);
$entityManager->flush();

*/