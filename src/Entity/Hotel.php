<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Mime\Message;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID_Hotel")]
    #[Groups("hotel")]
    private ?int $idHotel = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Entrer le libelle SVP')] 
    #[Groups("hotel")]
    private ?string $libelle = null;

    #[ORM\Column(length: 254)]
    #[Assert\NotBlank(message: "Entrer l'adresse SVP")] 
    #[Groups("hotel")]
    private ?string $adresse = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Entrer le nombre de chambre disponible  SVP')]
    #[Assert\PositiveOrZero(message: 'le nombre de chambre doit etre positive')] 
    #[Groups("hotel")]
    private ?int $nbreChambres = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Entrer le numero de telephone de l'hotel SVP")] 
    #[Assert\PositiveOrZero(message:'Numero de Telephone invalide')]
    #[Assert\Regex(
        pattern: '/^\d{8}$/',
        message: 'Le numéro de téléphone doit contenir exactement 8 chiffres')]
        #[Groups("hotel")]
    private ?int $telephone = null;

    #[ORM\Column(length: 65535)]
    #[Assert\NotBlank(message: "Entrer une bref description sur l'hotel SVP")] 
    #[Assert\Regex(
        pattern: '/^[a-zA-Z0-9,.!? ]+$/',
        message: 'La description ne doit contenir que des lettres, des chiffres et les caractères suivants : .,!?')]
        #[Groups("hotel")]
        private ?string $description = null;

    public function getIdHotel(): ?int
    {
        return $this->idHotel;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNbreChambres(): ?int
    {
        return $this->nbreChambres;
    }

    public function setNbreChambres(int $nbreChambres): self
    {
        $this->nbreChambres = $nbreChambres;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

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
