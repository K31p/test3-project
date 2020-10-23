<?php

namespace App\Entity;

use App\Repository\SchoolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SchoolRepository::class)
 */
class School
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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Klas::class, mappedBy="school", orphanRemoval=true)
     */
    private $klas;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="school")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $tuition;

    public function __construct()
    {
        $this->klas = new ArrayCollection();
        $this->setCreatedAt(new \DateTime('now'));

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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
            $kla->setSchool($this);
        }

        return $this;
    }

    public function removeKla(Klas $kla): self
    {
        if ($this->klas->contains($kla)) {
            $this->klas->removeElement($kla);
            // set the owning side to null (unless already changed)
            if ($kla->getSchool() === $this) {
                $kla->setSchool(null);
            }
        }

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTuition(): ?string
    {
        return $this->tuition;
    }

    public function setTuition(string $tuition): self
    {
        $this->tuition = $tuition;

        return $this;
    }
}
