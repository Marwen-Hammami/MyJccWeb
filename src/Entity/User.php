<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column(name: "ID_User", type: Types::INTEGER)]
#[Groups("reservation")]
private ?int $idUser = null;

    #[ORM\Column(length: 30)]
    #[Groups("reservation")]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    #[Groups("reservation")]
    private ?string $prenom = null;

    #[ORM\Column(length: 30)]
    #[Groups("reservation")]
    private ?string $genre = null;

    #[ORM\Column(length: 50)]
    #[Groups("reservation")]
    private ?string $email = null;

    #[ORM\Column(length: 100)]
    #[Groups("reservation")]
    private ?string $motdepasse = null;

    #[ORM\Column(length: 30)]
    #[Groups("reservation")]
    private ?string $role = null;

    #[ORM\Column(length: 65535)]
    #[Groups("reservation")]
    private ?string $photob64 = null;

    #[ORM\Column]
    #[Groups("reservation")]
    private ?int $numtel = null;

    public function getIdUser(): ?int
    {
        return $this->idUser;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

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

    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    public function setNumtel(?int $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }
}