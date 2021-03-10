<?php

namespace App\Controller;

use App\Entity\Card;
use App\Repository\CardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowAllCardsController extends AbstractController
{

    /**
     * @Route("/cards/show-all", name="show_all_cards")
     */
    public function __invoke(): Response
    {
        $cards = $this->getDoctrine()
            ->getRepository(Card::class)
            ->findAll();

        return $this->render('show_all_cards/index.html.twig', [
            'controller_name' => 'ShowAllCardsController',
            'cards' => $cards,
        ]);
    }
}
