<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_film', type: 'integer')]
    #[Groups(['reservation', 'vote'])]
    private ?int $idFilm = null;

    #[ORM\Column(length: 254)]
    #[Groups(['reservation', 'vote'])]
    #[SerializedName("titre")]
    private ?string $titre = null;

    #[ORM\Column(length: 254)]
    #[Groups(['reservation', 'vote'])]
    private ?string $daterealisation = null;

    #[ORM\Column(length: 254)]
    #[Groups(['reservation', 'vote'])]
    private ?string $genre = null;

    #[ORM\Column(length: 65535)]
    #[Groups(['reservation', 'vote'])]
    private ?string $resume = null;

    #[ORM\Column(length: 254)]
    #[Groups(['reservation', 'vote'])]
    private ?string $duree = null;

    #[ORM\Column]
    #[Groups(['reservation', 'vote'])]
    private ?float $prix = null;

    #[ORM\Column(length: 254)]
    #[Groups(['reservation', 'vote'])]
    private ?string $idProducteur = null;

    #[ORM\Column(length: 65535)]
    #[Groups(['reservation', 'vote'])]
    private ?string $acteur = null;

    #[ORM\Column(length: 254)]
    #[Groups(['reservation', 'vote'])]
    private ?string $filmimage = null;

    public function getIdFilm(): ?int
    {
        return $this->idFilm;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDaterealisation(): ?string
    {
        return $this->daterealisation;
    }

    public function setDaterealisation(string $daterealisation): self
    {
        $this->daterealisation = $daterealisation;

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

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdProducteur(): ?string
    {
        return $this->idProducteur;
    }

    public function setIdProducteur(string $idProducteur): self
    {
        $this->idProducteur = $idProducteur;

        return $this;
    }

    public function getActeur(): ?string
    {
        return $this->acteur;
    }

    public function setActeur(string $acteur): self
    {
        $this->acteur = $acteur;

        return $this;
    }

    public function getFilmimage(): ?string
    {
        return $this->filmimage;
    }

    public function setFilmimage(string $filmimage): self
    {
        $this->filmimage = $filmimage;

        return $this;
    }
    public function __toString(): string
    {
        return $this->titre;
    }
}
