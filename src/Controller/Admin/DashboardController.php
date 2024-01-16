<?php

namespace App\Controller\Admin;

use App\Controller\OpeningHoursController;
use App\Entity\Brand;
use App\Entity\Contact;
use App\Entity\OpeningHours;
use App\Entity\Review;
use App\Entity\SecondHandCar;
use App\Entity\Services;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
//use http\Client\Curl\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage Automobile - Vincent Parrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fa-regular fa-user', User::class);
        yield MenuItem::linkToCrud('Services', 'fa fa-briefcase', Services::class);
        yield MenuItem::linkToCrud('Brand', 'fa-regular fa-copyright', Brand::class);
        yield MenuItem::linkToCrud('SecondHandCar', 'fa-solid fa-car', SecondHandCar::class);
        yield MenuItem::linkToCrud('Contact', 'fa fa-phone', Contact::class);
        yield MenuItem::linkToCrud('Review', 'fa fa-quote-right', Review::class);
        yield MenuItem::linkToCrud('OpeningHours', 'fa-solid fa-car', OpeningHours::class);

    }
}