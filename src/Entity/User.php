<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }



    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername()
    {
       return $this->email;
    }

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true,nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true,nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true,nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true,nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $collection;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Actualite", mappedBy="user_id")
     */
    private $actualites;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="user_id")
     */
    private $commande_id;
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Streaming", mappedBy="user_id")
     */
    private $streaming;

    /**
     * @return mixed
     */
    public function getStreaming()
    {
        return $this->streaming;
    }

    /**
     * @param mixed $streaming
     */
    public function setStreaming($streaming): void
    {
        $this->streaming = $streaming;
    }

    /**
     * @return mixed
     */
    public function getCommandeId()
    {
        return $this->commande_id;
    }

    /**
     * @param mixed $commande_id
     */
    public function setCommandeId($commande_id): void
    {
        $this->commande_id = $commande_id;
    }
    public function __construct()
    {
        $this->actualites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?array
    {
        $roles = $this->roles;


        return array_unique($roles);
    }

    public function setRoles($roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getCollection(): ?string
    {
        return $this->collection;
    }

    public function setCollection(string $collection): self
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * @return Collection|Actualite[]
     */
    public function getActualites(): Collection
    {
        return $this->actualites;
    }

    public function addActualite(Actualite $actualite): self
    {
        if (!$this->actualites->contains($actualite)) {
            $this->actualites[] = $actualite;
            $actualite->addUserId($this);
        }

        return $this;
    }

    public function removeActualite(Actualite $actualite): self
    {
        if ($this->actualites->contains($actualite)) {
            $this->actualites->removeElement($actualite);
            $actualite->removeUserId($this);
        }

        return $this;
    }


}
