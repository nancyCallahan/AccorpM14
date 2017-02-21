<?php

namespace GestorDeProjectesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tasca
 *
 * @ORM\Table(name="tasca")
 * @ORM\Entity(repositoryClass="GestorDeProjectesBundle\Repository\TascaRepository")
 */
class Tasca
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
     * @ORM\Column(name="email_persona", type="string", length=255, unique=true)
     */
    private $emailPersona;

    /**
     * @var int
     *
     * @ORM\Column(name="id_projecte", type="integer", unique=true)
     */
    private $idProjecte;

    /**
     * @var int
     *
     * @ORM\Column(name="coditipus", type="integer", unique=true)
     */
    private $codiTipus;

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
     * Set emailPersona
     *
     * @param string $emailPersona
     *
     * @return Tasca
     */
    public function setEmailPersona($emailPersona)
    {
        $this->emailPersona = $emailPersona;

        return $this;
    }

    /**
     * Get emailPersona
     *
     * @return string
     */
    public function getEmailPersona()
    {
        return $this->emailPersona;
    }

    /**
     * Set idProjecte
     *
     * @param integer $idProjecte
     *
     * @return Tasca
     */
    public function setIdProjecte($idProjecte)
    {
        $this->idProjecte = $idProjecte;

        return $this;
    }

    /**
     * Get idProjecte
     *
     * @return int
     */
    public function getIdProjecte()
    {
        return $this->idProjecte;
    }

    /**
     * Set codiTipus
     *
     * @param integer $codiTipus
     *
     * @return Tasca
     */
    public function setCodiTipus($codiTipus)
    {
        $this->codiTipus = $codiTipus;

        return $this;
    }

    /**
     * Get codiTipus
     *
     * @return integer
     */
    public function getCodiTipus()
    {
        return $this->codiTipus;
    }

    /**
     * Set descripcio
     *
     * @param string $descripcio
     *
     * @return Tasca
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
