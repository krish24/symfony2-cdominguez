<?php

namespace MySite\DataBaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MySite\DataBaseBundle\Entity\GastoDetalle
 *
 * @ORM\Table(name="gastodetalle")
 * @ORM\Entity(repositoryClass="MySite\DataBaseBundle\Repository\GastoDetalleRepository")
 */
class GastoDetalle
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
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="gastoDetalles", cascade={"persist"})
     * @ORM\JoinColumn(name="idcategoria", referencedColumnName="id")
     */
    private $categoria;
    
    /**
     * @ORM\OneToMany(targetEntity="Gasto", mappedBy="detalle", cascade={"persist"})
     */
    private $gastos;
    
    /**
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="gastoDetalles")
     */
    private $usuarios;
    
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
     * Set categoria
     *
     * @param MySite\DataBaseBundle\Entity\Categoria $categoria
     */
    public function setCategoria(\MySite\DataBaseBundle\Entity\Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * Get categoria
     *
     * @return MySite\DataBaseBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
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
     * Add usuarios
     *
     * @param MySite\DataBaseBundle\Entity\Usuario $usuarios
     */
    public function addUsuario(\MySite\DataBaseBundle\Entity\Usuario $usuarios)
    {
        $this->usuarios[] = $usuarios;
    }

    /**
     * Get usuarios
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
}