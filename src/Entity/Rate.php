<?php


namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\VoteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Assert\Range;

#[ORM\Entity(repositoryClass: VoteRepository::class)]
class Rate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_Vote")]
    private ?int $ID_Vote = null;

    public function getID_Vote(): ?int
    {
        return $this->ID_Vote;
    }

    /**
     * @ORM\Column(type="integer")
     */
    #[Assert\NotBlank]
    #[Assert\Range(min: 0, max: 5, notInRangeMessage: 'il faut que le rate entre {{ min }} et {{ max }}',)]
    #[ORM\Column]
    private ?int $valeur = null;

    #[Assert\NotNull(message: ' User est requis')]
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'ID_user', referencedColumnName: 'ID_User')]

    private ?User $idUser = null;


    #[ORM\ManyToOne(targetEntity: Film::class)]
    #[ORM\JoinColumn(name: 'id_film', referencedColumnName: 'id_film')]
    #[Assert\NotNull(message: ' Film est requis')]
    private ?Film $idFilm = null;

    #[Assert\NotNull(message: ' commentaire est requis')]
    #[ORM\Column(length: 254)]
    private ?string $commentaire = null;


    #[ORM\Column(type: 'date')]

    private \DateTime $dateVote;


    /**
     * @ORM\Column(type="integer")
     */
    #[Assert\NotNull(message: ' Vote est requis')]
    #[Assert\Range(min: 0, max: 1, notInRangeMessage: '{{ min }} ou {{ max }}',)]
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

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdFilm(): ?Film
    {
        return $this->idFilm;
    }

    public function setIdFilm(?Film $idFilm): self
    {
        $this->idFilm = $idFilm;

        return $this;
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
