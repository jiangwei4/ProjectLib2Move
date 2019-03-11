<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
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
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicule", mappedBy="Ville")
     */
    private $vehicules;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OffreDelLocationsBis", mappedBy="Ville")
     */
    private $offreDelLocationsBis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OffreDeLocationsBis", mappedBy="Ville")
     */
    private $offreDeLocationsBis;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
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
            $vehicule->setVille($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->contains($vehicule)) {
            $this->vehicules->removeElement($vehicule);
            // set the owning side to null (unless already changed)
            if ($vehicule->getVille() === $this) {
                $vehicule->setVille(null);
            }
        }

        return $this;
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
            $offreDelLocationsBi->setVille($this);
        }

        return $this;
    }

    public function removeOffreDelLocationsBi(OffreDelLocationsBis $offreDelLocationsBi): self
    {
        if ($this->offreDelLocationsBis->contains($offreDelLocationsBi)) {
            $this->offreDelLocationsBis->removeElement($offreDelLocationsBi);
            // set the owning side to null (unless already changed)
            if ($offreDelLocationsBi->getVille() === $this) {
                $offreDelLocationsBi->setVille(null);
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
            $offreDeLocationsBi->setVille($this);
        }

        return $this;
    }

    public function removeOffreDeLocationsBi(OffreDeLocationsBis $offreDeLocationsBi): self
    {
        if ($this->offreDeLocationsBis->contains($offreDeLocationsBi)) {
            $this->offreDeLocationsBis->removeElement($offreDeLocationsBi);
            // set the owning side to null (unless already changed)
            if ($offreDeLocationsBi->getVille() === $this) {
                $offreDeLocationsBi->setVille(null);
            }
        }

        return $this;
    }
}
