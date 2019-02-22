<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehiculeRepository")
 */
class Vehicule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Modele;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NumeroSerie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Kilometrage;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $DateAchat;

    /**
     * @ORM\Column(type="integer")
     */
    private $PrixAchat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Disponible;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gamme", inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Gamme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeVehicule", inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TypeVehicule;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Ville;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->Modele;
    }

    public function setModele(string $Modele): self
    {
        $this->Modele = $Modele;

        return $this;
    }

    public function getNumeroSerie(): ?string
    {
        return $this->NumeroSerie;
    }

    public function setNumeroSerie(string $NumeroSerie): self
    {
        $this->NumeroSerie = $NumeroSerie;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->Couleur;
    }

    public function setCouleur(string $Couleur): self
    {
        $this->Couleur = $Couleur;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->Matricule;
    }

    public function setMatricule(string $Matricule): self
    {
        $this->Matricule = $Matricule;

        return $this;
    }

    public function getKilometrage(): ?string
    {
        return $this->Kilometrage;
    }

    public function setKilometrage(string $Kilometrage): self
    {
        $this->Kilometrage = $Kilometrage;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->DateAchat;
    }

    public function setDateAchat(\DateTimeInterface $DateAchat): self
    {
        $this->DateAchat = $DateAchat;

        return $this;
    }

    public function getPrixAchat(): ?int
    {
        return $this->PrixAchat;
    }

    public function setPrixAchat(int $PrixAchat): self
    {
        $this->PrixAchat = $PrixAchat;

        return $this;
    }

    public function getDisponible(): ?string
    {
        return $this->Disponible;
    }

    public function setDisponible(string $Disponible): self
    {
        $this->Disponible = $Disponible;

        return $this;
    }

    public function getGamme(): ?Gamme
    {
        return $this->Gamme;
    }

    public function setGamme(?Gamme $Gamme): self
    {
        $this->Gamme = $Gamme;

        return $this;
    }

    public function getTypeVehicule(): ?TypeVehicule
    {
        return $this->TypeVehicule;
    }

    public function setTypeVehicule(?TypeVehicule $TypeVehicule): self
    {
        $this->TypeVehicule = $TypeVehicule;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->Ville;
    }

    public function setVille(?Ville $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }
}
