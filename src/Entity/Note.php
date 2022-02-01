<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $noteObtenue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoteObtenue(): ?int
    {
        return $this->noteObtenue;
    }

    public function setNoteObtenue(int $noteObtenue): self
    {
        $this->noteObtenue = $noteObtenue;

        return $this;
    }
}
