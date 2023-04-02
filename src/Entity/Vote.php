<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\VoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoteRepository::class)]
class Vote
{
    #[ORM\Column]
    private ?int $valeur = null;

    #[ORM\Id]
   
    private ?int $idUser = null;

    #[ORM\Id]
    #[ORM\Column(name: "ID_Film")]
    private ?int $idFilm = null;

    #[ORM\Column(length: 254)]
    private ?string $commentaire = null;

    #[ORM\Column(type: 'date')]
    private \DateTime $dateVote;

    #[ORM\Column]
    private ?int $voteFilm = null;

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function getIdFilm(): ?int
    {
        return $this->idFilm;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDateVote(): ?\DateTime
    {
        return $this->dateVote;
    }

    public function setDateVote(\DateTime $dateVote): self
    {
        $this->dateVote = $dateVote;

        return $this;
    }

    public function getVoteFilm(): ?int
    {
        return $this->voteFilm;
    }

    public function setVoteFilm(int $voteFilm): self
    {
        $this->voteFilm = $voteFilm;

        return $this;
    }
}
