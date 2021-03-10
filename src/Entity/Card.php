<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardRepository::class)
 */
class Card
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $filename;

    /**
     * @ORM\ManyToMany(targetEntity=Deck::class, mappedBy="cards")
     */
    private $decks;

    public function __construct()
    {
        $this->decks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return Collection|Deck[]
     */
    public function getDecks(): Collection
    {
        return $this->decks;
    }

    public function addDeck(Deck $deck): self
    {
        if (!$this->decks->contains($deck)) {
            $this->decks[] = $deck;
            $deck->addCard($this);
        }

        return $this;
    }

    public function removeDeck(Deck $deck): self
    {
        if ($this->decks->removeElement($deck)) {
            $deck->removeCard($this);
        }

        return $this;
    }
}
