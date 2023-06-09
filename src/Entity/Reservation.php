<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_res")]
    private ?int $idRes = null;

    #[ORM\Column]
    private ?int $idUser = null;

    #[ORM\ManyToOne(targetEntity: Planningfilmsalle::class)]
    #[ORM\JoinColumn(name: 'ID_Planningfilmsalle', referencedColumnName: 'ID_Planning')]
    private ?Planningfilmsalle $idPlan = null;

    public function getIdRes(): ?int
    {
        return $this->idRes;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdPlan(): ?Planningfilmsalle
    {
        return $this->idPlan;
    }

    public function setIdPlan(?Planningfilmsalle $idPlan): self
    {
        $this->idPlan = $idPlan;

        return $this;
    }
}
