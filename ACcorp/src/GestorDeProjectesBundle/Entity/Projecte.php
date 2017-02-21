<?php

namespace GestorDeProjectesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projecte
 *
 * @ORM\Table(name="projecte")
 * @ORM\Entity(repositoryClass="GestorDeProjectesBundle\Repository\ProjecteRepository")
 */
class Projecte
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
     * @ORM\Column(name="descripcio_curta", type="string", length=255)
     */
    private $descripcioCurta;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcio_llarga", type="string", length=255)
     */
    private $descripcioLlarga;

    /**
     * @var string
     *
     * @ORM\Column(name="entorn", type="string", length=255)
     */
    private $entorn;


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
     * Set descripcioCurta
     *
     * @param string $descripcioCurta
     *
     * @return Projecte
     */
    public function setDescripcioCurta($descripcioCurta)
    {
        $this->descripcioCurta = $descripcioCurta;

        return $this;
    }

    /**
     * Get descripcioCurta
     *
     * @return string
     */
    public function getDescripcioCurta()
    {
        return $this->descripcioCurta;
    }

    /**
     * Set descripcioLlarga
     *
     * @param string $descripcioLlarga
     *
     * @return Projecte
     */
    public function setDescripcioLlarga($descripcioLlarga)
    {
        $this->descripcioLlarga = $descripcioLlarga;

        return $this;
    }

    /**
     * Get descripcioLlarga
     *
     * @return string
     */
    public function getDescripcioLlarga()
    {
        return $this->descripcioLlarga;
    }

    /**
     * Set entorn
     *
     * @param string $entorn
     *
     * @return Projecte
     */
    public function setEntorn($entorn)
    {
        $this->entorn = $entorn;

        return $this;
    }

    /**
     * Get entorn
     *
     * @return string
     */
    public function getEntorn()
    {
        return $this->entorn;
    }
}

