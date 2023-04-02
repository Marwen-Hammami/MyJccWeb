<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\BlogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_blog")]
    private  ?int $idBlog = null;

    #[ORM\Column(length: 256)]
    private ?string $titre = null;

    #[ORM\Column]
    private ?int $idAuteur = null;

    #[ORM\Column(type: 'date')]
    private \DateTime $datePublication;

    #[ORM\Column(length: 256)]
    private ?string $contenu = null;

    #[ORM\Column(length: 256)]
    private ?string $etiquette = null;

    #[ORM\Column(length: 256)]
    private ?string $image = null;

    public function getIdBlog(): ?int
    {
        return $this->idBlog;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getIdAuteur(): ?int
    {
        return $this->idAuteur;
    }

    public function setIdAuteur(int $idAuteur): self
    {
        $this->idAuteur = $idAuteur;

        return $this;
    }

    public function getDatePublication(): ?\DateTime
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTime $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getEtiquette(): ?string
    {
        return $this->etiquette;
    }

    public function setEtiquette(string $etiquette): self
    {
        $this->etiquette = $etiquette;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
