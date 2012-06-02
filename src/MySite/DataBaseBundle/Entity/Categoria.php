<?php

namespace MySite\DataBaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MySite\DataBaseBundle\Entity\Categoria
 *
 * @ORM\Table(name="Categoria")
 * @ORM\Entity(repositoryClass="MySite\DataBaseBundle\Repository\CategoriaRepository")
 */
class Categoria
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $id;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="GastoDetalle", mappedBy="categoria", cascade={"persist"})
     */
    private $gastoDetalles;

    
    public function __construct()
    {
        $this->gastoDetalles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    /**
     * Add gastoDetalles
     *
     * @param MySite\DataBaseBundle\Entity\GastoDetalle $gastoDetalles
     */
    public function addGastoDetalle(\MySite\DataBaseBundle\Entity\GastoDetalle $gastoDetalles)
    {
        $this->gastoDetalles[] = $gastoDetalles;
    }

    /**
     * Get gastoDetalles
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGastoDetalles()
    {
        return $this->gastoDetalles;
    }
}