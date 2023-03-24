<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\ContratsponsoringRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratsponsoringRepository::class)]
class Contratsponsoring
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idContrat =null;

    #[ORM\Column(type: 'date')]
    private \DateTime $datedebut;

    #[ORM\Column(type: 'date')]
    private \DateTime $datefin;

    #[ORM\Column(length: 30)]
    private ?string $type=null;

    #[ORM\Column(length: 30)]
    private ?string $etat=null;

    #[ORM\Column]
    private ?float $salairedt=null;

    #[ORM\Column(length: 65535)]
    private ?string $termespdf=null;

    #[ORM\Column(length: 254)]
    private ?string $signaturesponsor=null;

    #[ORM\Column(length: 254)]
    private ?string $signaturephotographe=null;

    #[ORM\ManyToOne(inversedBy: 'Contratsponsoring')]
    private ?User $idSponsor= null;

    #[ORM\ManyToOne(inversedBy: 'Contratsponsoring')]
    private ?User $idPhotographe= null;

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
