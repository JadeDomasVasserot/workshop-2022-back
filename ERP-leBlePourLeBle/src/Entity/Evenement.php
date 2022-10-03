<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 * @ApiResource()
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ID;

    public function getID(): ?int
    {
        return $this->ID;
    }

    public function setID(int $ID): self
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Type;

    /**
     * @ORM\Column(type="float")
     */
    private $Duree;

    /**
     * @ORM\Column(type="float")
     */
    private $HeureDebut;

    /**
     * @ORM\Column(type="float")
     */
    private $HeureFin;

    public function getDuree(): ?float
    {
        return $this->Duree;
    }

    public function setDuree(float $Duree): self
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getHeureDebut(): ?float
    {
        return $this->HeureDebut;
    }

    public function setHeureDebut(float $HeureDebut): self
    {
        $this->HeureDebut = $HeureDebut;

        return $this;
    }

    public function getHeureFin(): ?float
    {
        return $this->HeureFin;
    }

    public function setHeureFin(float $HeureFin): self
    {
        $this->HeureFin = $HeureFin;

        return $this;
    }


}
