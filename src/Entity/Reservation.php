<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 * @ORM\Entity
 * @ORM\Table(
 *    name="reservation", 
 *    uniqueConstraints={
 *        @ORM\UniqueConstraint(name="reservation", columns={"voiture_id", "client_id","date_deb"})
 *    }
 * )
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Voiture::class, inversedBy="client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voiture;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeb;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="float")
     */
    private $prixJ;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getDateDeb(): ?\DateTimeInterface
    {
        return $this->dateDeb;
    }

    public function setDateDeb(\DateTimeInterface $dateDeb): self
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getPrixJ(): ?float
    {
        return $this->prixJ;
    }

    public function setPrixJ(float $prixJ): self
    {
        $this->prixJ = $prixJ;

        return $this;
    }
}
