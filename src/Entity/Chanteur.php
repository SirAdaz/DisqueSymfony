<?php

namespace App\Entity;

use App\Repository\ChanteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChanteurRepository::class)]
class Chanteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Disque>
     */
    #[ORM\OneToMany(targetEntity: Disque::class, mappedBy: 'chanteur')]
    private Collection $relation;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Disque>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Disque $disque): static
    {
        if (!$this->relation->contains($disque)) {
            $this->relation->add($disque);
            $disque->setChanteur($this);
        }

        return $this;
    }

    public function removeRelation(Disque $disque): static
    {
        if ($this->relation->removeElement($disque)) {
            // set the owning side to null (unless already changed)
            if ($disque->getChanteur() === $this) {
                $disque->setChanteur(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
