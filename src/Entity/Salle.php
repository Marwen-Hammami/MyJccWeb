<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\SalleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_salle")]
    private ?int $idSalle = null;

    #[ORM\Column(length: 254)]
    private ?string $nomsalle = null;

    #[ORM\Column(length: 254)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $capacite = null;

    #[ORM\Column(length: 254)]
    private ?string $numtelSalle = null;

    #[ORM\Column(length: 254)]
    private ?string $emailSalle = null;

    #[ORM\Column(length: 6)]
    private ?string $tempsOuverture = null;

    #[ORM\Column(length: 6)]
    private ?string $tempsFermuture = null;

    #[ORM\Column]
    private ?float $avis = null;

    public function getIdSalle(): ?int
    {
        return $this->idSalle;
    }

    public function getNomsalle(): ?string
    {
        return $this->nomsalle;
    }

    public function setNomsalle(string $nomsalle): self
    {
        $this->nomsalle = $nomsalle;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getNumtelSalle(): ?string
    {
        return $this->numtelSalle;
    }

    public function setNumtelSalle(string $numtelSalle): self
    {
        $this->numtelSalle = $numtelSalle;

        return $this;
    }

    public function getEmailSalle(): ?string
    {
        return $this->emailSalle;
    }

    public function setEmailSalle(string $emailSalle): self
    {
        $this->emailSalle = $emailSalle;

        return $this;
    }

    public function getTempsOuverture(): ?string
    {
        return $this->tempsOuverture;
    }

    public function setTempsOuverture(string $tempsOuverture): self
    {
        $this->tempsOuverture = $tempsOuverture;

        return $this;
    }

    public function getTempsFermuture(): ?string
    {
        return $this->tempsFermuture;
    }

    public function setTempsFermuture(string $tempsFermuture): self
    {
        $this->tempsFermuture = $tempsFermuture;

        return $this;
    }

    public function getAvis(): ?float
    {
        return $this->avis;
    }

    public function setAvis(float $avis): self
    {
        $this->avis = $avis;

        return $this;
    }
}
