<?php

namespace App\Entity;

use App\Repository\KlasHasLesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KlasHasLesRepository::class)
 */
class KlasHasLes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $vervallen;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $opvang;

    /**
     * @ORM\ManyToOne(targetEntity=Klas::class, inversedBy="klasHasLes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $klas;

    /**
     * @ORM\ManyToOne(targetEntity=Les::class, inversedBy="klasHasLes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $les;

    /**
     * @ORM\ManyToOne(targetEntity=Rooster::class, inversedBy="klasHasLes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rooster;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVervallen(): ?int
    {
        return $this->vervallen;
    }

    public function setVervallen(?int $vervallen): self
    {
        $this->vervallen = $vervallen;

        return $this;
    }

    public function getOpvang(): ?int
    {
        return $this->opvang;
    }

    public function setOpvang(?int $opvang): self
    {
        $this->opvang = $opvang;

        return $this;
    }

    public function getKlas(): ?Klas
    {
        return $this->klas;
    }

    public function setKlas(?Klas $klas): self
    {
        $this->klas = $klas;

        return $this;
    }

    public function getLes(): ?Les
    {
        return $this->les;
    }

    public function setLes(?Les $les): self
    {
        $this->les = $les;

        return $this;
    }

    public function getRooster(): ?Rooster
    {
        return $this->rooster;
    }

    public function setRooster(?Rooster $rooster): self
    {
        $this->rooster = $rooster;

        return $this;
    }
}
