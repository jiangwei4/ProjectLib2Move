<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity("Email")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Prenom;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\Column(type="simple_array")
     */
    private $Role;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Telephone;

    /**
     * @Assert\Email()
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NumPermis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Locations", mappedBy="user")
     */
    private $Location;

    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Factures", mappedBy="user")
     */
    private $factures;

    public function __construct()
    {
        $this->Role = array ('ROLE_USER');
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

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;
        return $this;
    }
    public function getRole()
    {
        return $this->Role;
    }

    public function setRole($Role): void
    {
        $this->Role = $Role;
    }
    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->Role;
    }

    /**
     * @param mixed $Role
     */
    public function setRoles($Role): void
    {
        $this->Role = $Role;
    }

    public function getUsername()
    {
        return $this->Email;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getNumPermis(): ?string
    {
        return $this->NumPermis;
    }

    public function setNumPermis(string $NumPermis): self
    {
        $this->NumPermis = $NumPermis;

        return $this;
    }

    public function eraseCredentials()
    {
    }
    public function getSalt()
    {
        return null;
    }
}