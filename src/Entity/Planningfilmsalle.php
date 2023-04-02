<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\PLanningfilmsalleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningfilmsalleRepository::class)]
class Planningfilmsalle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_Planning")]
    private ?int $idPlanning = null;

    #[ORM\Column(type: 'date')]
    private \DateTime $datediffusion;

    #[ORM\Column(length: 254)]
    private ?string $heurediffusion = null;

    #[ORM\ManyToOne(targetEntity: Salle::class)]
    #[ORM\JoinColumn(name: 'ID_Salle', referencedColumnName: 'ID_salle')]
    private ?Salle $idSalle = null;

    #[ORM\ManyToOne(targetEntity: Film::class)]
    #[ORM\JoinColumn(name: 'ID_film', referencedColumnName: 'ID_Film')]
    private ?Film $idFilm = null;


    public function getIdPlanning(): ?int
    {
        return $this->idPlanning;
    }

    public function getDatediffusion(): ?\DateTime
    {
        return $this->datediffusion;
    }

    public function setDatediffusion(\DateTime $datediffusion): self
    {
        $this->datediffusion = $datediffusion;

        return $this;
    }

    public function getHeurediffusion(): ?string
    {
        return $this->heurediffusion;
    }

    public function setHeurediffusion(string $heurediffusion): self
    {
        $this->heurediffusion = $heurediffusion;

        return $this;
    }

    public function getIdSalle(): ?Salle
    {
        return $this->idSalle;
    }

    public function setIdSalle(?Salle $idSalle): self
    {
        $this->idSalle = $idSalle;

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
