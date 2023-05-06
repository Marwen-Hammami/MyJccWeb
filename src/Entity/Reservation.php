<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("reservation")]
    private ?int $idRes=null;

    #[ORM\Column]
    #[Groups("reservation")]
    private ?int $idUser=null;

    #[ORM\ManyToOne(inversedBy: 'Reservation')]
    #[ORM\JoinColumn(name: 'id_plan', referencedColumnName: 'ID_Planning')]
    #[Groups("reservation")]
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
