<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OffreDeLocationsBisRepository")
 */
class OffreDeLocationsBis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeVehicule", inversedBy="offreDeLocationsBis")
     */
    private $TypeVehicule;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gamme", inversedBy="offreDeLocationsBis")
     */
    private $Gamme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="offreDeLocationsBis")
     */
    private $Ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $KmMax;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Prix;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getGamme(): ?Gamme
    {
        return $this->Gamme;
    }

    public function setGamme(?Gamme $Gamme): self
    {
        $this->Gamme = $Gamme;

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

    public function getKmMax(): ?int
    {
        return $this->KmMax;
    }

    public function setKmMax(?int $KmMax): self
    {
        $this->KmMax = $KmMax;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(?int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }
}
