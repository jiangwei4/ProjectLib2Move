<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GammeRepository")
 */
class Gamme
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
    private $Nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicule", mappedBy="Gamme")
     */
    private $vehicules;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OffreLocations", mappedBy="gamme")
     */
    private $offreLocations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OffreDelLocationsBis", mappedBy="Gamme")
     */
    private $offreDelLocationsBis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OffreDeLocationsBis", mappedBy="Gamme")
     */
    private $offreDeLocationsBis;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
        $this->offreLocations = new ArrayCollection();
        $this->offreDelLocationsBis = new ArrayCollection();
        $this->offreDeLocationsBis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules[] = $vehicule;
            $vehicule->setGamme($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->contains($vehicule)) {
            $this->vehicules->removeElement($vehicule);
            // set the owning side to null (unless already changed)
            if ($vehicule->getGamme() === $this) {
                $vehicule->setGamme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OffreLocations[]
     */
    public function getOffreLocations(): Collection
    {
        return $this->offreLocations;
    }

    public function addOffreLocation(OffreLocations $offreLocation): self
    {
        if (!$this->offreLocations->contains($offreLocation)) {
            $this->offreLocations[] = $offreLocation;
            $offreLocation->setGamme($this);
        }

        return $this;
    }

    public function removeOffreLocation(OffreLocations $offreLocation): self
    {
        if ($this->offreLocations->contains($offreLocation)) {
            $this->offreLocations->removeElement($offreLocation);
            // set the owning side to null (unless already changed)
            if ($offreLocation->getGamme() === $this) {
                $offreLocation->setGamme(null);
            }
        }

        return $this;
    }

    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        // to show the name of the Category in the select
        return $this->Nom;
        // to show the id of the Category in the select
        // return $this->id;
    }

    /**
     * @return Collection|OffreDelLocationsBis[]
     */
    public function getOffreDelLocationsBis(): Collection
    {
        return $this->offreDelLocationsBis;
    }

    public function addOffreDelLocationsBi(OffreDelLocationsBis $offreDelLocationsBi): self
    {
        if (!$this->offreDelLocationsBis->contains($offreDelLocationsBi)) {
            $this->offreDelLocationsBis[] = $offreDelLocationsBi;
            $offreDelLocationsBi->setGamme($this);
        }

        return $this;
    }

    public function removeOffreDelLocationsBi(OffreDelLocationsBis $offreDelLocationsBi): self
    {
        if ($this->offreDelLocationsBis->contains($offreDelLocationsBi)) {
            $this->offreDelLocationsBis->removeElement($offreDelLocationsBi);
            // set the owning side to null (unless already changed)
            if ($offreDelLocationsBi->getGamme() === $this) {
                $offreDelLocationsBi->setGamme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OffreDeLocationsBis[]
     */
    public function getOffreDeLocationsBis(): Collection
    {
        return $this->offreDeLocationsBis;
    }

    public function addOffreDeLocationsBi(OffreDeLocationsBis $offreDeLocationsBi): self
    {
        if (!$this->offreDeLocationsBis->contains($offreDeLocationsBi)) {
            $this->offreDeLocationsBis[] = $offreDeLocationsBi;
            $offreDeLocationsBi->setGamme($this);
        }

        return $this;
    }

    public function removeOffreDeLocationsBi(OffreDeLocationsBis $offreDeLocationsBi): self
    {
        if ($this->offreDeLocationsBis->contains($offreDeLocationsBi)) {
            $this->offreDeLocationsBis->removeElement($offreDeLocationsBi);
            // set the owning side to null (unless already changed)
            if ($offreDeLocationsBi->getGamme() === $this) {
                $offreDeLocationsBi->setGamme(null);
            }
        }

        return $this;
    }
}
