<?php

namespace App\Entity;

use App\Repository\RoosterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoosterRepository::class)
 */
class Rooster
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end;

    /**
     * @ORM\OneToMany(targetEntity=KlasHasLes::class, mappedBy="rooster")
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

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

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
            $klasHasLe->setRooster($this);
        }

        return $this;
    }

    public function removeKlasHasLe(KlasHasLes $klasHasLe): self
    {
        if ($this->klasHasLes->contains($klasHasLe)) {
            $this->klasHasLes->removeElement($klasHasLe);
            // set the owning side to null (unless already changed)
            if ($klasHasLe->getRooster() === $this) {
                $klasHasLe->setRooster(null);
            }
        }

        return $this;
    }
}
