<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SupportRepository")
 */
class Support
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
    private $typeSupport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="supports")
     */
    private $produit_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetailCommande", mappedBy="support_id")
     */
    private $detailCommandes;

    public function __construct()
    {
        $this->detailCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeSupport(): ?string
    {
        return $this->typeSupport;
    }

    public function setTypeSupport(string $typeSupport): self
    {
        $this->typeSupport = $typeSupport;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

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

    /**
     * @return Collection|DetailCommande[]
     */
    public function getDetailCommandes(): Collection
    {
        return $this->detailCommandes;
    }

    public function addDetailCommande(DetailCommande $detailCommande): self
    {
        if (!$this->detailCommandes->contains($detailCommande)) {
            $this->detailCommandes[] = $detailCommande;
            $detailCommande->setSupportId($this);
        }

        return $this;
    }

    public function removeDetailCommande(DetailCommande $detailCommande): self
    {
        if ($this->detailCommandes->contains($detailCommande)) {
            $this->detailCommandes->removeElement($detailCommande);
            // set the owning side to null (unless already changed)
            if ($detailCommande->getSupportId() === $this) {
                $detailCommande->setSupportId(null);
            }
        }

        return $this;
    }
}
