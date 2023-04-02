<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id =null;

    #[ORM\Column(length: 256)]
    private ?string $nomEvent=null;

    #[ORM\Column(type: "datetime")]
    private \DateTime $dateEtHeure;

    #[ORM\Column(length: 256)]
    private ?string $lieu=null;

    #[ORM\Column(length: 256)]
    private ?string $typeEvent=null;

    #[ORM\Column(length: 256)]
    private ?string $description=null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvent(): ?string
    {
        return $this->nomEvent;
    }

    public function setNomEvent(string $nomEvent): self
    {
        $this->nomEvent = $nomEvent;

        return $this;
    }

    public function getDateEtHeure(): ?\DateTime
    {
        return $this->dateEtHeure;
    }

    public function setDateEtHeure(\DateTime $dateEtHeure): self
    {
        $this->dateEtHeure = $dateEtHeure;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getTypeEvent(): ?string
    {
        return $this->typeEvent;
    }

    public function setTypeEvent(string $typeEvent): self
    {
        $this->typeEvent = $typeEvent;

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


}
