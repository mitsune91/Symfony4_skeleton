<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StreamingRepository")
 */
class Streaming
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
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qualité;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="streamings")
     */
    private $produit_id;
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="streaming")
     */
    private $user_id;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getQualité(): ?string
    {
        return $this->qualité;
    }

    public function setQualité(string $qualité): self
    {
        $this->qualité = $qualité;

        return $this;
    }

    public function getProduitId(): ?Produit
    {
        return $this->produit_id;
    }

    public function setProduitId(?Produit $produit_id): self
    {
        $this->produit_id = $produit_id;

        return $this;
    }
}
