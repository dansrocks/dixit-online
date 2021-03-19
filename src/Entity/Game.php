<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\UuidV4;
use \Exception;


/**
 * Class Game
 * @package App\Entity
 */
class Game
{
    /**
     * @var string $uuid
     */
    private $uuid;

    /**
     * @var Collection|Card[] $cardsInMaze
     */
    private $cardsInMaze;

    /**
     * @var Collection|Card[] $cardsDiscarted
     */
    private $cardsDiscarted;


    /**
     * Game constructor.
     * @param array $maze
     */
    public function __construct(array $maze)
    {
        $this->uuid = new UuidV4();
        $this->cardsInMaze = new ArrayCollection();
        $this->cardsDiscarted = new ArrayCollection();

        foreach ($maze as $card) {
            $this->addCardToMaze($card);
        }
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param Card $card
     * @return $this
     */
    private function addCardToMaze(Card $card): self
    {
        if (!$this->cardsInMaze->contains($card)) {
            $this->cardsInMaze[] = $card;
        }

        return $this;
    }

    /**
     * @return Collection|Card[]
     */
    public function getCardsInMaze() : Collection
    {
        return $this->cardsInMaze;
    }

    /**
     * @param Card $card
     * @return $this
     * @throws \Exception
     */
    public function discardCard(Card $card): self
    {
        if (! $this->cardsInMaze->removeElement($card)) {
            throw new Exception("Card to discard is not present at maze.");
        }
        $this->cardsDiscarted[] = $card;

        return $this;
    }
}
