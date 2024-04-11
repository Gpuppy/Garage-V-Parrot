<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact/index.html.twig')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $contactForm = new Contact();
        $form = $this->createForm(ContactFormType::class, $contactForm);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $manager->persist($contact);
            $manager->flush();
            //dd($contact);

            $this->addFlash('success', 'Votre message nous a bien été envoyé nous le traiterons dans le plus bref délais merci! :) ');

            return $this->redirectToRoute('contact/index.html.twig');
            /*return $this->redirectToRoute('app_contact', [
                //'form'=>$form,
            ]);*/

        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
            //'controller_name' => 'ContactController',
        ]);

    }

}
