<?php

namespace MySite\DataBaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MySite\DataBaseBundle\Entity\Gasto
 *
 * @ORM\Table(name="Gasto")
 * @ORM\Entity(repositoryClass="MySite\DataBaseBundle\Repository\GastoRepository")
 */
class Gasto
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
     * @var integer $cantidad
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var datetime $fecha
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="GastoDetalle", inversedBy="gastos", cascade={"persist"})
     * @ORM\JoinColumn(name="iddetalle", referencedColumnName="id")
     */
    private $detalle;

    public function __construct()
    {
        $this->fecha = new \DateTime();
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
     * Set cantidad
     *
     * @param integer $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fecha
     *
     * @param datetime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get fecha
     *
     * @return datetime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set detalle
     *
     * @param MySite\DataBaseBundle\Entity\GastoDetalle $detalle
     */
    public function setDetalle(\MySite\DataBaseBundle\Entity\GastoDetalle $detalle)
    {
        $this->detalle = $detalle;
    }

    /**
     * Get detalle
     *
     * @return MySite\DataBaseBundle\Entity\GastoDetalle 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }
}