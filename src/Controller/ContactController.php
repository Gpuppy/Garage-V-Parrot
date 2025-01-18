<?php

namespace App\Controller;

use App\Document\Contact;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactFormType;
//use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request,DocumentManager $dm): Response
    {
        $contactForm = new Contact();
        $form = $this->createForm(ContactFormType::class, $contactForm);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $dm->persist($contact);
            $dm->flush();
            //dd($contact);

            $this->addFlash('success', 'Votre message nous a bien été envoyé nous le traiterons dans le plus bref délais merci! :) ');

            return $this->redirectToRoute('contact');

        }
            return $this->render('contact/index.html.twig', [
                'form' => $form->createView(),
                //'controller_name' => 'ContactController',
            ]);
    }
}

