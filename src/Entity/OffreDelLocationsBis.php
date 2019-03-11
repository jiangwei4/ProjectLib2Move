<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OffreDelLocationsBisRepository")
 */
class OffreDelLocationsBis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeVehicule", inversedBy="offreDelLocationsBis")
     */
    private $TypeVehicule;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gamme", inversedBy="offreDelLocationsBis")
     */
    private $Gamme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\VIlle", inversedBy="offreDelLocationsBis")
     */
    private $Ville;

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

    public function getVille(): ?VIlle
    {
        return $this->Ville;
    }

    public function setVille(?VIlle $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }
}
