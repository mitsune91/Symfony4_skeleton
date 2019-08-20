<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetailCommandeRepository")
 */
class DetailCommande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroCommande;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroSupport;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Support", inversedBy="detailCommandes")
     */
    private $support_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commande", inversedBy="commande_id")
     */
    private $commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCommande(): ?int
    {
        return $this->numeroCommande;
    }

    public function setNumeroCommande(int $numeroCommande): self
    {
        $this->numeroCommande = $numeroCommande;

        return $this;
    }

    public function getNumeroSupport(): ?int
    {
        return $this->numeroSupport;
    }

    public function setNumeroSupport(int $numeroSupport): self
    {
        $this->numeroSupport = $numeroSupport;

        return $this;
    }

    public function getSupportId(): ?Support
    {
        return $this->support_id;
    }

    public function setSupportId(?Support $support_id): self
    {
        $this->support_id = $support_id;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }
}
