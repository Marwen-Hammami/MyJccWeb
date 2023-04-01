<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\LogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogsRepository::class)]
class Logs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_Logs")]
    private ?int $idLogs = null;

    #[ORM\Column]
    private ?int $idUser = null;

    #[ORM\Column(type: 'date')]
    private \DateTime $date;

    #[ORM\Column(length: 254)]
    private ?string $action = null;

    public function getIdLogs(): ?int
    {
        return $this->idLogs;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }
}
