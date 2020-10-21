<?php

namespace App\Entity;

use App\Repository\LesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LesRepository::class)
 */
class Les
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=KlasHasLes::class, mappedBy="les")
     */
    private $klasHasLes;

    public function __construct()
    {
        $this->klasHasLes = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getId();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|KlasHasLes[]
     */
    public function getKlasHasLes(): Collection
    {
        return $this->klasHasLes;
    }

    public function addKlasHasLe(KlasHasLes $klasHasLe): self
    {
        if (!$this->klasHasLes->contains($klasHasLe)) {
            $this->klasHasLes[] = $klasHasLe;
            $klasHasLe->setLes($this);
        }

        return $this;
    }

    public function removeKlasHasLe(KlasHasLes $klasHasLe): self
    {
        if ($this->klasHasLes->contains($klasHasLe)) {
            $this->klasHasLes->removeElement($klasHasLe);
            // set the owning side to null (unless already changed)
            if ($klasHasLe->getLes() === $this) {
                $klasHasLe->setLes(null);
            }
        }

        return $this;
    }
}
