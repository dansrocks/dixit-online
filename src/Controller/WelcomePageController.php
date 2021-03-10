<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomePageController extends AbstractController
{
    /**
     * @Route("/", name="welcome_page")
     */
    public function __invoke(): Response
    {
        return $this->render('welcome_page.html.twig', [
            'controller_name' => 'WelcomePageController',
        ]);
    }
}
