<?php

namespace App\Entity;

use App\Repository\ExamenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExamenRepository::class)
 */
class Examen
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
    private $nomExamen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomExamen(): ?string
    {
        return $this->nomExamen;
    }

    public function setNomExamen(string $nomExamen): self
    {
        $this->nomExamen = $nomExamen;

        return $this;
    }
}
