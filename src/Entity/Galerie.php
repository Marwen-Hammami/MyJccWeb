<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\GalerieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GalerieRepository::class)]
class Galerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idGalerie=null;

    #[ORM\Column(length: 20)]
    private ?string $couleurhtml=null;

    #[ORM\Column(length: 254)]
    private ?string $nom=null;

    #[ORM\Column(length: 65535)]
    private ?string $description=null;

    #[ORM\OneToOne(inversedBy: 'Galerie')]
    private ?User $idPhotographe=null;

    public function getIdGalerie(): ?int
    {
        return $this->idGalerie;
    }

    public function getCouleurhtml(): ?string
    {
        return $this->couleurhtml;
    }

    public function setCouleurhtml(string $couleurhtml): self
    {
        $this->couleurhtml = $couleurhtml;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getIdPhotographe(): ?User
    {
        return $this->idPhotographe;
    }

    public function setIdPhotographe(?User $idPhotographe): self
    {
        $this->idPhotographe = $idPhotographe;

        return $this;
    }


}
