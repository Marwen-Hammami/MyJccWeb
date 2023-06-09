<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\PrixRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrixRepository::class)]
class Prix
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_Prix")]
    private ?int $idPrix = null;

    #[ORM\Column(length: 254)]
    private ?string $typeprix = null;

    #[ORM\ManyToOne(targetEntity: Film::class)]
    #[ORM\JoinColumn(name: 'ID_film', referencedColumnName: 'ID_Film')]
    private ?Film $idFilm = null;

    public function getIdPrix(): ?int
    {
        return $this->idPrix;
    }

    public function getTypeprix(): ?string
    {
        return $this->typeprix;
    }

    public function setTypeprix(string $typeprix): self
    {
        $this->typeprix = $typeprix;

        return $this;
    }

    public function getIdFilm(): ?Film
    {
        return $this->idFilm;
    }

    public function setIdFilm(?Film $idFilm): self
    {
        $this->idFilm = $idFilm;

        return $this;
    }
}
