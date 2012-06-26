<?php

namespace MySite\DataBaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MySite\DataBaseBundle\Entity\TipoCuenta
 *
 * @ORM\Table(name="tipocuenta")
 * @ORM\Entity(repositoryClass="MySite\DataBaseBundle\Repository\TipoCuentaRepository")
 */
class TipoCuenta
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
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;
    
    /**
     * @ORM\OneToMany(targetEntity="Cuenta", mappedBy="tipo", cascade={"persist"})
     */
    private $cuentas;
    
    public function __construct()
    {
        $this->cuentas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add cuentas
     *
     * @param MySite\DataBaseBundle\Entity\Cuenta $cuentas
     */
    public function addCuenta(\MySite\DataBaseBundle\Entity\Cuenta $cuentas)
    {
        $this->cuentas[] = $cuentas;
    }

    /**
     * Get cuentas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCuentas()
    {
        return $this->cuentas;
    }
}