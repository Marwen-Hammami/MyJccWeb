<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\PLanningfilmsalleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PlanningfilmsalleRepository::class)]
class Planningfilmsalle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'ID_Planning', type: 'integer')]
    #[Groups("reservation")]
    private ?int $idPlanning=null;

    #[ORM\Column(type: 'date')]
    #[Groups("reservation")]
    private \DateTime $datediffusion;

    #[ORM\Column(length: 254)]
    #[Groups("reservation")]
    private ?string $heurediffusion=null;

    #[ORM\ManyToOne(inversedBy: 'Planningfilmsalle')]
    #[ORM\JoinColumn(name: 'id_salle', referencedColumnName: 'id_salle')]
    #[Groups("reservation")]
    private ?Salle $idSalle=null;
    

    #[ORM\ManyToOne(inversedBy: 'Planningfilmsalle')]
    #[ORM\JoinColumn(name: 'id_film', referencedColumnName: 'id_film')]
    #[Groups("reservation")]
    private ?Film $idFilm=null;

    
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
