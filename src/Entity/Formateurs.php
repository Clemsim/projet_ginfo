<?php

namespace App\Entity;

use App\Repository\FormateursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormateursRepository::class)]
class Formateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'formateurs')]
    private ?formations $formation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormation(): ?formations
    {
        return $this->formation;
    }

    public function setFormation(?formations $formation): static
    {
        $this->formation = $formation;

        return $this;
    }
}
