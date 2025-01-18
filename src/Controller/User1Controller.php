<?php

namespace App\Controller;

use App\Document\User1;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class User1Controller extends AbstractController
{
    #[Route('/add-user', name: 'add_user')]
    public function addUser(DocumentManager $dm): Response
    {
        $user = new User1();
        $user->setName('John Doe');
        $user->setEmail('john.doe@example.com');

        $dm->persist($user);
        $dm->flush();

        return new Response('User created with ID: ' . $user->getId());
    }
}
