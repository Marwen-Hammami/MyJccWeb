<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idHotel =null;

    #[ORM\Column(length: 50)]
    private ?string $libelle=null;

    #[ORM\Column(length: 254)]
    private ?string $adresse=null;

    #[ORM\Column]
    private ?int $nbreChambres=null;

    #[ORM\Column]
    private ?int $telephone=null;

    #[ORM\Column(length: 65535)]
    private ?string $description=null;

    public function getIdHotel(): ?int
    {
        return $this->idHotel;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

    public function getNbreChambres(): ?int
    {
        return $this->nbreChambres;
    }

    public function setNbreChambres(int $nbreChambres): self
    {
        $this->nbreChambres = $nbreChambres;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
