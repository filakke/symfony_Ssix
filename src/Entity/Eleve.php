<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EleveRepository::class)
 */
class Eleve
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adresse;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaiss;

    /**
     * @ORM\ManyToOne(targetEntity=Inscription::class, inversedBy="OneToOne")
     */
    private $eleve;

    /**
     * @ORM\OneToMany(targetEntity=convocation::class, mappedBy="eleve")
     */
    private $convation;

    public function __construct()
    {
        $this->convation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getEleve(): ?Inscription
    {
        return $this->eleve;
    }

    public function setEleve(?Inscription $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * @return Collection|convocation[]
     */
    public function getConvation(): Collection
    {
        return $this->convation;
    }

    public function addConvation(convocation $convation): self
    {
        if (!$this->convation->contains($convation)) {
            $this->convation[] = $convation;
            $convation->setEleve($this);
        }

        return $this;
    }

    public function removeConvation(convocation $convation): self
    {
        if ($this->convation->removeElement($convation)) {
            // set the owning side to null (unless already changed)
            if ($convation->getEleve() === $this) {
                $convation->setEleve(null);
            }
        }

        return $this;
    }
}
