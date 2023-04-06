<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\ReservationHotelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReservationHotelRepository::class)]
class ReservationHotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_ReservationH")]
    private ?int $idReservationh = null;

    #[ORM\Column(type: 'date')]
    private \DateTime $datereservation;

    #[ORM\Column(type: 'date')]
    #[Assert\NotNull(message: 'La date de début est requise')]
    #[GreaterThanOrEqual(value: 'today', message: 'La date de début doit être supérieure ou égale à la date actuelle')]
    private \DateTime $dateDebut;

    #[ORM\Column(type: 'date')]
    #[Assert\NotNull(message: 'La date de fin est requise')]
    #[Assert\GreaterThan(propertyPath: "dateDebut", message: 'La date de fin doit être après la date de début')]
    private \DateTime $dateFin;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Entrer la Tarif totale de la reservation  SVP')]
    #[Assert\PositiveOrZero(message: 'Tarif totale doit etre positive')] 
    private ?float $tariftotale = null;

    #[ORM\Column(length: 254)]
    private ?string $qrpath = null;

    #[ORM\ManyToOne(targetEntity: Hotel::class)]
    #[ORM\JoinColumn(name: 'ID_hotel', referencedColumnName: 'ID_Hotel')]
    #[Assert\NotNull(message: ' l\'hôtel est requis')]
    private ?Hotel $idHotel = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'ID_user', referencedColumnName: 'ID_User')]
    #[Assert\NotNull(message: 'l\'utilisateur est requis')]
    private ?User $idUser = null;

    public function getIdReservationh(): ?int
    {
        return $this->idReservationh;
    }

    public function getDatereservation(): ?\DateTime
    {
        return $this->datereservation;
    }

    public function setDatereservation(\DateTime $datereservation): self
    {
        $this->datereservation = $datereservation;

        return $this;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTime $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTime $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getTariftotale(): ?float
    {
        return $this->tariftotale;
    }

    public function setTariftotale(float $tariftotale): self
    {
        $this->tariftotale = $tariftotale;

        return $this;
    }

    public function getQrpath(): ?string
    {
        return $this->qrpath;
    }

    public function setQrpath(string $qrpath): self
    {
        $this->qrpath = $qrpath;

        return $this;
    }

    public function getIdHotel(): ?Hotel
    {
        return $this->idHotel;
    }

    public function setIdHotel(?Hotel $idHotel): self
    {
        $this->idHotel = $idHotel;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
