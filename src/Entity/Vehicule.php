<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 20, name: 'matricule')]
    #[Assert\NotBlank(message: 'Le matricule est obligatoire.')]
    #[Assert\Regex(
        pattern: '/^\w{3,} Tunisie \w{4,}$/',
        message: 'Le matricule doit être au format "XXX Tunisie YYYY"'
    )]
    #[Groups("vehicule")]
    private ?string $matricule = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: 'Le type de véhicule est obligatoire.')]
    #[Groups("vehicule")]
    private ?string $type = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'La marque est obligatoire.')]
    #[Groups("vehicule")]
    private ?string $marque = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: 'La couleur est obligatoire.')]
    #[Groups("vehicule")]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z]+$/',
        message: 'La couleur ne doit contenir que des lettres.'
    )]
    #[Assert\Length(
        max: 20,
        maxMessage: 'La couleur ne doit pas dépasser {{ limit }} caractères.'
    )]
    #[Groups("vehicule")]
    private ?string $couleur = null;



    public function getMatricule(): ?string
    {
        return $this->matricule;
    }
    
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
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
