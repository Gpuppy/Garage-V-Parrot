<?php

namespace App\Entity;

use App\Repository\SecondHandCarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SecondHandCarRepository::class)]
class SecondHandCar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $km = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $year = null;

    #[ORM\ManyToOne(inversedBy: 'SecondHandCar')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brand $brand = null;

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



    public function getKm(): ?int
    {
        return $this->km;
    }

    public function setKm(string $km): static
    {
        $this->km = $km;

        return $this;

}

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): static
    {
        $this->year = $year;

        return $this;
    }


    public function getBrand(): ?Brand
    {
        return $this->brand;
    }


    public function setBrand(?Brand $brand): void
    {
        $this->brand = $brand;
    }
}


