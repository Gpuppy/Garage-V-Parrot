<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'brand', targetEntity: SecondHandCar::class)]
    ##[ORM\JoinColumn(nullable: false)]
    private Collection $SecondHandCar;

    public function __construct()
    {
        $this->SecondHandCar = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSecondHandCar(): ?self
    {
        return $this->SecondHandCar;
    }

    public function setSecondHandCar(?self $SecondHandCar): static
    {
        $this->SecondHandCar = $SecondHandCar;

        return $this;
    }

    public function addSecondHandCar(self $secondHandCar): static
    {
        if (!$this->SecondHandCar->contains($secondHandCar)) {
            $this->SecondHandCar->add($secondHandCar);
            $secondHandCar->setSecondHandCar($this);
        }

        return $this;
    }

    public function removeSecondHandCar(self $secondHandCar): static
    {
        if ($this->SecondHandCar->removeElement($secondHandCar)) {
            // set the owning side to null (unless already changed)
            if ($secondHandCar->getSecondHandCar() === $this) {
                $secondHandCar->setSecondHandCar(null);
            }
        }

        return $this;
    }
}
