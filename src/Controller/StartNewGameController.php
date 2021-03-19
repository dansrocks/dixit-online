<?php

namespace App\Controller;

use App\Entity\Card;
use App\Entity\Game;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StartNewGameController extends AbstractController
{
    /**
     * @Route("/game/new", name="start_new_game")
     */
    public function index(): Response
    {
        $game = new Game($this->getMaze());

        return $this->render('start_new_game.html.twig', [
            'controller_name' => 'StartNewGameController',
            'game' => $game
        ]);
    }

    /**
     * @return Collection|Card[]
     */
    private function getMaze(): array
    {
        $cards = $this->getDoctrine()
            ->getRepository(Card::class)
            ->findAll();

        return $cards;
    }
}
