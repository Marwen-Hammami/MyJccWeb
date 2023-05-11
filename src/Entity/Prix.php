<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\PrixRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PrixRepository::class)]
class Prix
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_Prix")]
    private ?int $idPrix = null;

    #[Assert\Choice(['OR', 'SILVER', 'BRONZE'],  message: 'choisis entre OR , SILVER ou BRONZE')]
    #[Assert\NotNull(message: 'choisis entre OR , SILVER ou BRONZE')]
    #[ORM\Column(length: 254)]
    private ?string $typeprix = null;


    #[ORM\ManyToOne(targetEntity: Film::class)]
    #[ORM\JoinColumn(name: 'ID_Film', referencedColumnName: 'ID_Film')]
    #[Assert\NotNull(message: ' Film est requis')]
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
