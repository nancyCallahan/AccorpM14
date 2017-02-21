<?php

namespace GestorDeProjectesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipus
 *
 * @ORM\Table(name="tipus")
 * @ORM\Entity(repositoryClass="GestorDeProjectesBundle\Repository\TipusRepository")
 */
class Tipus
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcio", type="string", length=255)
     */
    private $descripcio;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcio
     *
     * @param string $descripcio
     *
     * @return Tipus
     */
    public function setDescripcio($descripcio)
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    /**
     * Get descripcio
     *
     * @return string
     */
    public function getDescripcio()
    {
        return $this->descripcio;
    }
}

