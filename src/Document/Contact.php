<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
//use Doctrine\ORM\Mapping as ORM;


#[MongoDB\Document]
class Contact
{
    #[MongoDB\Id]
    private ?string $id = null;

    #[MongoDB\Field(type: "string")]
    private ?string $firstname = null;

    #[MongoDB\Field(type: "string")]
    private ?string $lastname = null;

    #[MongoDB\Field(type: "string")]
    private ?string $email= null;

    #[MongoDB\Field(type: "string")]
    private ?string $telephone = null;

    #[MongoDB\Field(type: "string")]
    private ?string $message = null;


    #[MongoDB\Field(type: 'date', nullable: true)]
    private ?\DateTimeImmutable $createdAt ;

    #[MongoDB\Field(type: "bool")]
    private bool $processed = false;

    /*public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }*/


    public function isProcessed(): ?bool
    {
        return $this->processed;
    }

    public function setProcessed(bool $processed): static
    {
        $this->processed = $processed;

        return $this;
    }

    // Getters and setters
    public function getId(): ?string
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstname;
    }

    public function setFirstName(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastname;
    }

    public function setLastName(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

}

