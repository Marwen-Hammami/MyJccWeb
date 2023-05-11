<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_User")]
    private ?int $idUser = null;

    #[ORM\Column(length: 255)]
    #[Groups('users')]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Groups('users')]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Groups('users')]
    private ?string $prenom = null;



    #[Assert\NotBlank(message:"Le mot de passe est obligatoire")]
    #[ORM\Column,
    Assert\Length(
        min:8,
        minMessage:'Votre mot de passe doit avoir un minimum de 8 caractères'
    )]
    #[Groups('users')]
    private ?string $password = null;


    public $confirm_password;
    private $blocked = false;

    public function isBlocked(): bool
    {
        return $this->blocked;
    }

    public function setBlocked(bool $blocked): void
    {
        $this->blocked = $blocked;
    }
    #[ORM\Column(length: 255)]
    #[Groups('users')]

    private ?string $photob64 = null;

    #[ORM\Column(length: 255)]
    #[Groups('users')]

    private ?string $genre = null;

    #[ORM\Column]
    #[Groups('users')]

    private ?int $numtel = null;

    #[ORM\Column(length: 30)]
    private ?string $roles = null;
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

    public function getRole(): ?string
    {
        return $this->roles;
    }

    public function setRole(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getidUser(): ?int
    {
        return $this->idUser;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->prenom;
    }

    public function setUsername(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPhotob64(): ?string
    {
        return $this->photob64;
    }

    public function setPhotob64(string $photob64): self
    {
        $this->photob64 = $photob64;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    public function setNumtel(int $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }
}
