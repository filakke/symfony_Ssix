<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnseignantRepository::class)
 */
class Enseignant
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
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ville;

    /**
     * @ORM\OneToMany(targetEntity=Convocation::class, mappedBy="enseignant")
     */
    private $convocation;

    public function __construct()
    {
        $this->convocation = new ArrayCollection();
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

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection|Convocation[]
     */
    public function getConvocation(): Collection
    {
        return $this->convocation;
    }

    public function addConvocation(Convocation $convocation): self
    {
        if (!$this->convocation->contains($convocation)) {
            $this->convocation[] = $convocation;
            $convocation->setEnseignant($this);
        }

        return $this;
    }

    public function removeConvocation(Convocation $convocation): self
    {
        if ($this->convocation->removeElement($convocation)) {
            // set the owning side to null (unless already changed)
            if ($convocation->getEnseignant() === $this) {
                $convocation->setEnseignant(null);
            }
        }

        return $this;
    }
}
