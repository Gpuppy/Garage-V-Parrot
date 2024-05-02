<?php

namespace App\Service;

use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;

class ReviewService
{

    private $manager;

    private $flash;

    public function __construct(EntityManagerInterface $manager, /*FlashBagInterface $flash*/)
    {
        $this->manager = $manager;
        //$this->flash = $flash;

    }

    public function persistReview(Review $review) : void
    {
        $review->SetApproved(false);

            $this->manager->persist($review);
            $this->manager->flush();
            $this->flash->add('success', 'Votre avis nous a bien été envoyé merci! :) ');
    }


}