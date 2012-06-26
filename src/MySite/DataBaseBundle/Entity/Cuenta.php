<?php

namespace MySite\DataBaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MySite\DataBaseBundle\Entity\Cuenta
 *
 * @ORM\Table(name="cuenta")
 * @ORM\Entity(repositoryClass="MySite\DataBaseBundle\Repository\CuentaRepository")
 */
class Cuenta
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
     * @ORM\ManyToOne(targetEntity="TipoCuenta", inversedBy="cuentas", cascade={"persist"})
     * @ORM\JoinColumn(name="idtipocuenta", referencedColumnName="id")
     */
    private $tipo;
    
    /**
     * @var datetime $fechaCierre
     *
     * @ORM\Column(name="fechacierre", type="datetime")
     */
    private $fechaCierre;
    
    /**
     * @ORM\OneToMany(targetEntity="Gasto", mappedBy="usuario", cascade={"persist"})
     */
    private $gastos;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="cuentas")
     * @ORM\JoinColumn(name="idusuario", referencedColumnName="id")
     */
    private $usuario;
    
    public function __construct()
    {
        $this->gastos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fechaCierre
     *
     * @param datetime $fechaCierre
     */
    public function setFechaCierre($fechaCierre)
    {
        $this->fechaCierre = $fechaCierre;
    }

    /**
     * Get fechaCierre
     *
     * @return datetime 
     */
    public function getFechaCierre()
    {
        return $this->fechaCierre;
    }

    /**
     * Set tipo
     *
     * @param MySite\DataBaseBundle\Entity\TipoCuenta $tipo
     */
    public function setTipo(\MySite\DataBaseBundle\Entity\TipoCuenta $tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * Get tipo
     *
     * @return MySite\DataBaseBundle\Entity\TipoCuenta 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Add gastos
     *
     * @param MySite\DataBaseBundle\Entity\Gasto $gastos
     */
    public function addGasto(\MySite\DataBaseBundle\Entity\Gasto $gastos)
    {
        $this->gastos[] = $gastos;
    }

    /**
     * Get gastos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGastos()
    {
        return $this->gastos;
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
}