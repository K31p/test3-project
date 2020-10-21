<?php

namespace App\Entity;

use App\Repository\NiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 */
class Niveau
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
     * @ORM\OneToMany(targetEntity=Klas::class, mappedBy="niveau", orphanRemoval=true)
     */
    private $klas;

    public function __construct()
    {
        $this->klas = new ArrayCollection();
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
     * @return Collection|Klas[]
     */
    public function getKlas(): Collection
    {
        return $this->klas;
    }

    public function addKla(Klas $kla): self
    {
        if (!$this->klas->contains($kla)) {
            $this->klas[] = $kla;
            $kla->setNiveau($this);
        }

        return $this;
    }

    public function removeKla(Klas $kla): self
    {
        if ($this->klas->contains($kla)) {
            $this->klas->removeElement($kla);
            // set the owning side to null (unless already changed)
            if ($kla->getNiveau() === $this) {
                $kla->setNiveau(null);
            }
        }

        return $this;
    }
}
