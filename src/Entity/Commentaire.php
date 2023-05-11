<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_commentaire")]
    private ?int $idCommentaire = null;

    #[ORM\Column(type: 'date')]
    private \DateTime $dateCommentaire;

    #[ORM\Column(length: 256)]
    private ?string $contenu = null;

    #[ORM\ManyToOne(targetEntity: Blog::class)]
    #[ORM\JoinColumn(name: 'ID_blog', referencedColumnName: 'id_blog')]
    private ?Blog $idBlog = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'ID_Auteur', referencedColumnName: 'ID_User')]
    private ?User $idAuteur = null;

    public function getIdCommentaire(): ?int
    {
        return $this->idCommentaire;
    }

    public function getDateCommentaire(): ?\DateTime
    {
        return $this->dateCommentaire;
    }

    public function setDateCommentaire(\DateTime $dateCommentaire): self
    {
        $this->dateCommentaire = $dateCommentaire;

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

    public function getIdBlog(): ?Blog
    {
        return $this->idBlog;
    }

    public function setIdBlog(?Blog $idBlog): self
    {
        $this->idBlog = $idBlog;

        return $this;
    }

    public function getIdAuteur(): ?User
    {
        return $this->idAuteur;
    }

    public function setIdAuteur(?User $idAuteur): self
    {
        $this->idAuteur = $idAuteur;

        return $this;
    }
}
