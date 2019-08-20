<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
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
     * @ORM\Column(type="datetime")
     */
    private $dateCommande;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixCommande;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DetailCommande", inversedBy="commande")
     */
    private $commande_id;
    /**
 * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commande_id")
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

    public function __construct()
    {
        $this->commande_id = new ArrayCollection();
    }

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

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getPrixCommande(): ?int
    {
        return $this->prixCommande;
    }

    public function setPrixCommande(int $prixCommande): self
    {
        $this->prixCommande = $prixCommande;

        return $this;
    }

    /**
     * @return Collection|DetailCommande[]
     */
    public function getCommandeId(): Collection
    {
        return $this->commande_id;
    }

    public function addCommandeId(DetailCommande $commandeId): self
    {
        if (!$this->commande_id->contains($commandeId)) {
            $this->commande_id[] = $commandeId;
            $commandeId->setCommande($this);
        }

        return $this;
    }

    public function removeCommandeId(DetailCommande $commandeId): self
    {
        if ($this->commande_id->contains($commandeId)) {
            $this->commande_id->removeElement($commandeId);
            // set the owning side to null (unless already changed)
            if ($commandeId->getCommande() === $this) {
                $commandeId->setCommande(null);
            }
        }

        return $this;
    }
}
