<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 20)]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private ?string $matricule = null;

    #[ORM\Column(length: 20)]
    private ?string $type=null;

    #[ORM\Column(length: 50)]
    private ?string $marque=null;

    #[ORM\Column(length: 20)]
    private ?string $couleur=null;

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }


}
