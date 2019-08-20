<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(type="datetime")
     */
    private $dateProduction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $presentation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artiste", inversedBy="produits")
     */
    private $artiste_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Streaming", mappedBy="produit_id")
     */
    private $streamings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Support", mappedBy="produit_id")
     */
    private $supports;

    public function __construct()
    {
        $this->streamings = new ArrayCollection();
        $this->supports = new ArrayCollection();
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

    public function getDateProduction(): ?\DateTimeInterface
    {
        return $this->dateProduction;
    }

    public function setDateProduction(\DateTimeInterface $dateProduction): self
    {
        $this->dateProduction = $dateProduction;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getArtisteId(): ?Artiste
    {
        return $this->artiste_id;
    }

    public function setArtisteId(?Artiste $artiste_id): self
    {
        $this->artiste_id = $artiste_id;

        return $this;
    }

    /**
     * @return Collection|Streaming[]
     */
    public function getStreamings(): Collection
    {
        return $this->streamings;
    }

    public function addStreaming(Streaming $streaming): self
    {
        if (!$this->streamings->contains($streaming)) {
            $this->streamings[] = $streaming;
            $streaming->setProduitId($this);
        }

        return $this;
    }

    public function removeStreaming(Streaming $streaming): self
    {
        if ($this->streamings->contains($streaming)) {
            $this->streamings->removeElement($streaming);
            // set the owning side to null (unless already changed)
            if ($streaming->getProduitId() === $this) {
                $streaming->setProduitId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Support[]
     */
    public function getSupports(): Collection
    {
        return $this->supports;
    }

    public function addSupport(Support $support): self
    {
        if (!$this->supports->contains($support)) {
            $this->supports[] = $support;
            $support->setProduitId($this);
        }

        return $this;
    }

    public function removeSupport(Support $support): self
    {
        if ($this->supports->contains($support)) {
            $this->supports->removeElement($support);
            // set the owning side to null (unless already changed)
            if ($support->getProduitId() === $this) {
                $support->setProduitId(null);
            }
        }

        return $this;
    }
}
