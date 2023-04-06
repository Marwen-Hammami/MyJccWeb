<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\LocationVehiculeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LocationVehiculeRepository::class)]
class LocationVehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_location")]
    private ?int $idLocation = null;

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
    private ?float $tariftotal = null;

    #[ORM\Column(length: 254)]
    private ?string $qrpath = null;

    #[ORM\ManyToOne(targetEntity: Vehicule::class)]
    #[ORM\JoinColumn(name: 'matricule', referencedColumnName: 'matricule')]
    #[Assert\NotNull(message: ' vehiule est requis')]
    private ?Vehicule $matricule = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'ID_user', referencedColumnName: 'ID_User')]
    #[Assert\NotNull(message: 'l\'utilisateur est requis')]
    private ?User $idUser = null;

    public function getIdLocation(): ?int
    {
        return $this->idLocation;
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

    public function getTariftotal(): ?float
    {
        return $this->tariftotal;
    }

    public function setTariftotal(float $tariftotal): self
    {
        $this->tariftotal = $tariftotal;

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

    public function getMatricule(): ?Vehicule
    {
        return $this->matricule;
    }

    public function setMatricule(?Vehicule $matricule): self
    {
        $this->matricule = $matricule;

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
