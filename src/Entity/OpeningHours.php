<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;
use phpDocumentor\Reflection\Types\Integer;


#[ORM\Entity(repositoryClass: OpeningHoursRepository::class)]
class OpeningHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 100)]
    private ?string $dayOfWeek;
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $timeOpen = null ;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $timeClose = null;

   #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'openingHours')]
   ##[ORM\Column(length: 11)]
   #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: true, onDelete: 'CASCADE')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDayOfWeek(): ?string
    {
        return $this->dayOfWeek;
    }
    public function setDayOfWeek($dayOfWeek): self
    {
        $this->dayOfWeek = $dayOfWeek;

        return $this;
    }

    public function getTimeOpen(): ?\DateTimeInterface
    {
        return $this->timeOpen;
    }
    public function setTimeOpen(\DateTimeImmutable $timeOpen): self
    {
        $this->timeOpen = $timeOpen;

        return $this;
    }

    public function getTimeClose(): \DateTimeInterface
    {
        return $this->timeClose;
    }
    public function setTimeClose(?\DateTimeImmutable $timeClose): self
    {
        $this->timeClose = $timeClose;

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



}
