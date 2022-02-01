<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
 */
class Inscription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $numIncription;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=Eleve::class, mappedBy="eleve")
     */
    private $OneToOne;

    public function __construct()
    {
        $this->OneToOne = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumIncription(): ?string
    {
        return $this->numIncription;
    }

    public function setNumIncription(string $numIncription): self
    {
        $this->numIncription = $numIncription;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Eleve[]
     */
    public function getOneToOne(): Collection
    {
        return $this->OneToOne;
    }

    public function addOneToOne(Eleve $oneToOne): self
    {
        if (!$this->OneToOne->contains($oneToOne)) {
            $this->OneToOne[] = $oneToOne;
            $oneToOne->setEleve($this);
        }

        return $this;
    }

    public function removeOneToOne(Eleve $oneToOne): self
    {
        if ($this->OneToOne->removeElement($oneToOne)) {
            // set the owning side to null (unless already changed)
            if ($oneToOne->getEleve() === $this) {
                $oneToOne->setEleve(null);
            }
        }

        return $this;
    }
}
