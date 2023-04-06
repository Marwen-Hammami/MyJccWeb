<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\PhotographieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PhotographieRepository::class)]
class Photographie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_Photographie")]
    private ?int $idPhotographie = null;

    #[ORM\Column(length: 254)]
    #[Assert\NotBlank(message: "Le nom de la photographie est obligatoire")]
    private ?string $nom = null;

    #[ORM\Column(length: 65535)]
    #[Assert\NotBlank(message: "Une courte description est obligatoire")]
    private ?string $description = null;

    #[ORM\Column(length: 254)]
    #[Assert\NotBlank(message: "Chemain de la photographie est obligatoire")]
    private ?string $photographiepath = null;

    #[ORM\ManyToOne(targetEntity: Galerie::class)]
    #[ORM\JoinColumn(name: 'ID_galerie', referencedColumnName: 'ID_Galerie')]
    private ?Galerie $idGalerie = null;

    public function getIdPhotographie(): ?int
    {
        return $this->idPhotographie;
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

    public function getPhotographiepath(): ?string
    {
        return $this->photographiepath;
    }

    public function setPhotographiepath(string $photographiepath): self
    {
        $this->photographiepath = $photographiepath;

        return $this;
    }

    public function getIdGalerie(): ?Galerie
    {
        return $this->idGalerie;
    }

    public function setIdGalerie(?Galerie $idGalerie): self
    {
        $this->idGalerie = $idGalerie;

        return $this;
    }
}
