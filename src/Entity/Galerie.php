<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\GalerieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GalerieRepository::class)]
class Galerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_Galerie")]
    private ?int $idGalerie = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: "Une couleur en code html est obligatoire")]
    private ?string $couleurhtml = null;

    #[ORM\Column(length: 254)]
    #[Assert\NotBlank(message: "Le nom de la galerie est obligatoire")]
    private ?string $nom = null;

    #[ORM\Column(length: 65535)]
    #[Assert\NotBlank(message: "Une courte description est obligatoire")]
    private ?string $description = null;

    #[ORM\OneToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_photographe', referencedColumnName: 'ID_User')]
    private ?User $idPhotographe = null;

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
