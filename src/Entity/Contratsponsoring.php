<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\ContratsponsoringRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ContratsponsoringRepository::class)]
class Contratsponsoring
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_Contrat")]
    #[Groups("contratsponsoring")]
    private ?int $idContrat = null;

    #[ORM\Column(type: 'date')]
    #[Assert\NotBlank(message: "Date de début est obligatoire")]
    #[Assert\GreaterThanOrEqual("today", message: "La date doit être égale ou supérieure à aujourd'hui")]
    #[Groups("contratsponsoring")]
    private \DateTime $datedebut;

    #[ORM\Column(type: 'date')]
    #[Assert\NotNull(message: "Date de fin est obligatoire")]
    #[Assert\NotBlank(message: "Date de fin est obligatoire")]
    #[Assert\GreaterThanOrEqual("today", message: "La date doit être égale ou supérieure à aujourd'hui")]
    #[Assert\GreaterThanOrEqual(propertyPath: "datedebut", message: "La date de fin doit être supérieure à la date de début")]
    #[Groups("contratsponsoring")]
    private \DateTime $datefin;

    #[ORM\Column(length: 30)]
    #[Assert\Choice(
        choices: ["ParPhoto", "ParHeure", "ParSoiree", "ParEdition"],
        message: "Type invalide! Types autorisés sont: ParPhoto, ParHeure, ParSoiree, ParEdition."
    )]
    #[Groups("contratsponsoring")]
    private ?string $type = null;

    #[ORM\Column(length: 30)]
    #[Assert\Choice(
        choices: ["Proposition", "ContreProposition", "EnCours", "Expire"],
        message: "Etat invalide! Etats autorisés sont: Proposition, ContreProposition, EnCours, Expire."
    )]
    #[Groups("contratsponsoring")]
    private ?string $etat = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Salaire (rémunération) obligatoire")]
    #[Assert\Positive(message: "Le salaire doit être un nombre positif")]
    #[Groups("contratsponsoring")]
    private ?float $salairedt = null;

    #[ORM\Column(length: 65535)]
    // #[Assert\NotBlank(message: "termes pdf obligatoire")]
    #[Groups("contratsponsoring")]
    private ?string $termespdf = null;

    #[ORM\Column(length: 254)]
    #[Assert\NotBlank(message: "Votre signature de Sponsor est obligatoire")]
    #[Groups("contratsponsoring")]
    private ?string $signaturesponsor = null;

    #[ORM\Column(length: 254)]
    // #[Assert\NotBlank(message: "signature photographe obligatoire")]
    #[Groups("contratsponsoring")]
    private ?string $signaturephotographe = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'ID_Sponsor', referencedColumnName: 'ID_User')]
    #[Groups("contratsponsoring")]
    private ?User $idSponsor = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'ID_Photographe', referencedColumnName: 'ID_User')]
    #[Groups("contratsponsoring")]
    private ?User $idPhotographe = null;

    public function getIdContrat(): ?int
    {
        return $this->idContrat;
    }

    public function getDatedebut(): ?\DateTime
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTime $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTime
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTime $datefin): self
    {
        $this->datefin = $datefin;

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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getSalairedt(): ?float
    {
        return $this->salairedt;
    }

    public function setSalairedt(float $salairedt): self
    {
        $this->salairedt = $salairedt;

        return $this;
    }

    public function getTermespdf(): ?string
    {
        return $this->termespdf;
    }

    public function setTermespdf(string $termespdf): self
    {
        $this->termespdf = $termespdf;

        return $this;
    }

    public function getSignaturesponsor(): ?string
    {
        return $this->signaturesponsor;
    }

    public function setSignaturesponsor(string $signaturesponsor): self
    {
        $this->signaturesponsor = $signaturesponsor;

        return $this;
    }

    public function getSignaturephotographe(): ?string
    {
        return $this->signaturephotographe;
    }

    public function setSignaturephotographe(string $signaturephotographe): self
    {
        $this->signaturephotographe = $signaturephotographe;

        return $this;
    }

    public function getIdSponsor(): ?User
    {
        return $this->idSponsor;
    }

    public function setIdSponsor(?User $idSponsor): self
    {
        $this->idSponsor = $idSponsor;

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
