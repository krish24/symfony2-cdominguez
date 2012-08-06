<?php

namespace MySite\DataBaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MySite\DataBaseBundle\Entity\Gasto
 *
 * @ORM\Table(name="gasto")
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
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="gastos")
     * @ORM\JoinColumn(name="idusuario", referencedColumnName="id")
     */
    private $usuario;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cuenta", inversedBy="gastos", cascade={"remove"})
     * @ORM\JoinColumn(name="idcuenta", referencedColumnName="id", nullable=true)
     */
    private $cuenta;
    
    /**
     * @var boolean $future
     *
     * @ORM\Column(name="future", type="boolean")
     */
    private $future;
    
    public function __construct()
    {
        $this->fecha = new \DateTime();
        $this->future = false;
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

    /**
     * Set usuario
     *
     * @param MySite\DataBaseBundle\Entity\Usuario $usuario
     */
    public function setUsuario(\MySite\DataBaseBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Get usuario
     *
     * @return MySite\DataBaseBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set cuenta
     *
     * @param MySite\DataBaseBundle\Entity\Cuenta $cuenta
     */
    public function setCuenta(\MySite\DataBaseBundle\Entity\Cuenta $cuenta)
    {
        $this->cuenta = $cuenta;
    }

    /**
     * Get cuenta
     *
     * @return MySite\DataBaseBundle\Entity\Cuenta 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }
    
    /**
     * Set future
     *
     * @param boolean $future
     */
    public function setFuture($future)
    {
        $this->future = $future;
    }

    /**
     * Get future
     *
     * @return boolean 
     */
    public function isFuture()
    {
        return $this->future;
    }
}