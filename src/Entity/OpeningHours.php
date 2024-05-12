<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningHoursRepository::class)]
class OpeningHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    private ?\DateTimeInterface $day;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeImmutable $openingHours;
    private ?\DateTimeImmutable $closingHours;

    public function getId(): ?int
    {
        return $this->id;
    }

    /*public function getTitle():
    {
        return $this->title;
    }
    public function setTitle():
    {


    }*/

    public function getDay(): ?\DateTimeInterface
    {
        return $this->day;
    }
    public function setDay(\DateTimeImmutable $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getOpeningHours(): ?\DateTimeImmutable
    {
        return $this->openingHours;
    }
    public function setOpeningHours(\DateTimeImmutable $openingHours): self
    {
        $this->openingHours = $openingHours;

        return $this;
    }

    public function getClosingHours(): ?\DateTimeImmutable
    {
        return $this->closingHours;
    }
    public function setClosingHours(\DateTimeImmutable $closingHours): self
    {
        $this->closingHours = $closingHours;

        return $this;
    }


}
