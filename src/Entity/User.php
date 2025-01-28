<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use http\Env\Response;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
#[IsGranted('ROLE_ADMIN')]
#[IsGranted('ROLE_SUPER_ADMIN')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];


    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    ##[ORM\OneToMany(inversedBy: 'User')]
    ##[ORM\JoinColumn(nullable: false)]
    #private ?OpeningHours $openingHours = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: OpeningHours::class, cascade: ['persist', 'remove'])]
    private Collection $openingHours;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Review::class, cascade: ['persist', 'remove'])]
    private Collection $reviews;

    ##[ORM\Column(type: 'string')]
    #[ORM\OneToMany(mappedBy: 'user', targetEntity: SecondHandCar::class, cascade: ['persist', 'remove'])]
    ##[ORM\JoinColumn(nullable: false)]
    private Collection $secondHandCars;

    ##[ORM\OneToMany(mappedBy: 'brand', targetEntity: SecondHandCar::class)]
    ##[ORM\JoinColumn(nullable: false)]
    #private Collection $SecondHandCar;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;

    }

    public function getSecondHandCars(): Collection
    {
        return $this->secondHandCars;
    }


    //  __toString method
    public function __toString(): string
    {
        return $this->email ?? 'User';
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function adminDashboard(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();

        // or add an optional message - seen by developers
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        return new Response('Well hi there '.$user->getFirstName());
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    private function denyAccessUnlessGranted(string $string, $null, string $string1)
    {
    }

    public function __construct()
    {
        $this->openingHours = new ArrayCollection();
        $this->secondHandCars = new ArrayCollection();
    }

    public function getOpeningHours(): Collection
    {
        return $this->openingHours;
    }

    public function addOpeningHour(OpeningHours $openingHour): self
    {
        if (!$this->openingHours->contains($openingHour)) {
            $this->openingHours->add($openingHour);
            $openingHour->setUser($this);
        }

        return $this;
    }

    public function removeOpeningHour(OpeningHours $openingHour): self
    {
        if ($this->openingHours->removeElement($openingHour)) {
            // Set the owning side to null (unless already changed)
            if ($openingHour->getUser() === $this) {
                $openingHour->setUser(null);
            }
        }

        return $this;
    }


    public function getReviews(): Collection
    {
        return $this->openingHours;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setUser($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // Set the owning side to null (unless already changed)
            if ($review->getUser() === $this) {
                $review->setUser(null);
            }
        }

        return $this;
    }

    public function addSecondHandCar(SecondHandCar $secondHandCar): self
    {
        if (!$this->secondHandCars->contains($secondHandCar)) {
            $this->secondHandCars->add($secondHandCar);
            $secondHandCar->setUser($this);
        }

        return $this;
    }

    public function removeSecondHandCar(SecondHandCar $secondHandCar): self
    {
        if ($this->secondHandCars->removeElement($secondHandCar)) {
            // Set the owning side to null (unless already changed)
            if ($secondHandCar->getUser() === $this) {
                $secondHandCar->setUser(null);
            }
        }

        return $this;
    }
}
