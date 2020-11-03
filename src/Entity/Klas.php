<?php

namespace App\Entity;

use App\Repository\KlasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KlasRepository::class)
 */
class Klas
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
     * @ORM\ManyToOne(targetEntity=School::class, inversedBy="klas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $school;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class, inversedBy="klas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau;

    /**
     * @ORM\OneToMany(targetEntity=KlasHasLes::class, mappedBy="klas", orphanRemoval=true)
     */
    private $klasHasLes;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="klas")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Student::class, mappedBy="klas")
     */
    private $student;

    public function __construct()
    {
        $this->klasHasLes = new ArrayCollection();
        $this->user = new ArrayCollection();
        $this->student = new ArrayCollection();
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

    public function getSchool(): ?School
    {
        return $this->school;
    }

    public function setSchool(?School $school): self
    {
        $this->school = $school;

        return $this;
    }

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

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
            $klasHasLe->setKlas($this);
        }

        return $this;
    }

    public function removeKlasHasLe(KlasHasLes $klasHasLe): self
    {
        if ($this->klasHasLes->contains($klasHasLe)) {
            $this->klasHasLes->removeElement($klasHasLe);
            // set the owning side to null (unless already changed)
            if ($klasHasLe->getKlas() === $this) {
                $klasHasLe->setKlas(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setKlas($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getKlas() === $this) {
                $user->setKlas(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudent(): Collection
    {
        return $this->student;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->student->contains($student)) {
            $this->student[] = $student;
            $student->setKlas($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->student->contains($student)) {
            $this->student->removeElement($student);
            // set the owning side to null (unless already changed)
            if ($student->getKlas() === $this) {
                $student->setKlas(null);
            }
        }

        return $this;
    }
}
