<?php

namespace App\Entity;

use App\Repository\FormationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationsRepository::class)]
class Formations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Formateurs>
     */
    #[ORM\OneToMany(targetEntity: Formateurs::class, mappedBy: 'formation')]
    private Collection $formateurs;

    public function __construct()
    {
        $this->formateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Collection<int, Formateurs>
     */
    public function getFormateurs(): Collection
    {
        return $this->formateurs;
    }

    public function addFormateur(Formateurs $formateur): static
    {
        if (!$this->formateurs->contains($formateur)) {
            $this->formateurs->add($formateur);
            $formateur->setFormation($this);
        }

        return $this;
    }

    public function removeFormateur(Formateurs $formateur): static
    {
        if ($this->formateurs->removeElement($formateur)) {
            // set the owning side to null (unless already changed)
            if ($formateur->getFormation() === $this) {
                $formateur->setFormation(null);
            }
        }

        return $this;
    }
}
