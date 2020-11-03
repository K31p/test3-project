<?php

namespace App\Entity;

use App\Repository\TakeOrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TakeOrderRepository::class)
 */
class TakeOrder
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
    private $placedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="takeOrder")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=School::class, inversedBy="takeOrder")
     * @ORM\JoinColumn(nullable=false)
     */
    private $school;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlacedAt(): ?\DateTimeInterface
    {
        return $this->placedAt;
    }

    public function setPlacedAt(\DateTimeInterface $placedAt): self
    {
        $this->placedAt = $placedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
}
