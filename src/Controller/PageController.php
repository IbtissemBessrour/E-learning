<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/about-us', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('page/about.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/Courses', name: 'app_Courses')]
    public function Courses(): Response
    {
        return $this->render('page/Courses.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/Team', name: 'app_Team')]
    public function Team(): Response
    {
        return $this->render('page/Team.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/Testimonial', name: 'app_Testimonial')]
    public function Testimonial(): Response
    {
        return $this->render('page/Testimonial.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/404', name: 'app_404-Page')]
    public function Page(): Response
    {
        return $this->render('page/404.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('page/contact.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}
