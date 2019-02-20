<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OffreLocationsRepository")
 */
class OffreLocations
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
    private $typeVehicule;

    /**
     * @ORM\Column(type="integer")
     */
    private $kmMax;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;



    /**
     * @ORM\Column(type="string")
     */
    private $ville;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name= $name;
        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeVehicule(): ?string
    {
        return $this->typeVehicule;
    }

    public function setTypeVehicule(string $typeVehicule): self
    {
        $this->typeVehicule = $typeVehicule;

        return $this;
    }

    public function getKmMax(): ?int
    {
        return $this->kmMax;
    }

    public function setKmMax(int $kmMax): self
    {
        $this->kmMax = $kmMax;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville= $ville;
        return $this;
    }

}
