<?php

namespace App\Entity;

use App\Repository\DisqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DisqueRepository::class)]
class Disque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    #[Assert\Length(min:2, max:50)]
    private ?string $nameDisque = null;

    #[ORM\ManyToOne(inversedBy: 'relation')]
    private ?Chanteur $chanteur = null;

    /**
     * @var Collection<int, Chanson>
     */
    #[ORM\OneToMany(targetEntity: Chanson::class, mappedBy: 'chanson')]
    private Collection $chansons;

    public function __construct()
    {
        $this->chansons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNameDisque(): ?string
    {
        return $this->nameDisque;
    }

    public function setNameDisque(string $nameDisque): static
    {
        $this->nameDisque = $nameDisque;

        return $this;
    }

    public function getChanteur(): ?Chanteur
    {
        return $this->chanteur;
    }

    public function setChanteur(?Chanteur $chanteur): static
    {
        $this->chanteur = $chanteur;

        return $this;
    }

    /**
     * @return Collection<int, Chanson>
     */
    public function getChansons(): Collection
    {
        return $this->chansons;
    }

    public function addChanson(Chanson $chanson): static
    {
        if (!$this->chansons->contains($chanson)) {
            $this->chansons->add($chanson);
            $chanson->setChanson($this);
        }

        return $this;
    }

    public function removeChanson(Chanson $chanson): static
    {
        if ($this->chansons->removeElement($chanson)) {
            // set the owning side to null (unless already changed)
            if ($chanson->getChanson() === $this) {
                $chanson->setChanson(null);
            }
        }

        return $this;
    }
}
