<?php

namespace MySite\DataBaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * MySite\DataBaseBundle\Entity\Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="MySite\DataBaseBundle\Repository\UsuarioRepository")
 */
class Usuario implements UserInterface
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
     * @var string $displayName
     *
     * @ORM\Column(name="displayname", type="string", length=255)
     */
    private $displayName;
    
    /**
     * @ORM\Column(name="username", type="string", length=25, unique=true)
     */
    private $username;
    
     /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;
    
    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;
    
    /**
     * @var integer $capital
     *
     * @ORM\Column(name="capital", type="integer")
     */
    private $capital;
    
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     */
    private $email;
    
    /**
     * @ORM\ManyToMany(targetEntity="Categoria", inversedBy="usuarios")
     * @ORM\JoinTable(name="usuario_categoria"),
     *      joinColumns={@ORM\JoinColumn(name="usuario_id", referencedColumnName="id")},
     *      joinColumns={@ORM\JoinColumn(name="categoria_id", referencedColumnName="id")},
     */
    private $categorias;
    
    /**
     * @ORM\ManyToMany(targetEntity="GastoDetalle", inversedBy="usuarios")
     * @ORM\JoinTable(name="usuario_gastodetalle"),
     *      joinColumns={@ORM\JoinColumn(name="usuario_id", referencedColumnName="id")},
     *      joinColumns={@ORM\JoinColumn(name="gastodetalle_id", referencedColumnName="id")},
     */
    private $gastoDetalles;
    
    /**
     * @ORM\OneToMany(targetEntity="Gasto", mappedBy="usuario", cascade={"persist"})
     */
    private $gastos;
    
    /**
     * @ORM\OneToMany(targetEntity="Cuenta", mappedBy="usuario")
     */
    private $cuentas;
    
    public function __construct()
    {
        $this->salt = md5(uniqid(null, true));
    }
    
    public function __toString() {
        return $this->getUsername();
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
     * Set displayName
     *
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * Get displayName
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
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

    public function equals(UserInterface $user) {
        return $user->getUsername() === $this->getUsername();
    }

    public function eraseCredentials() 
    { 
    }

    public function getRoles() 
    {
        return array('ROLE_ADMIN');
    }

    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername() 
    {
        return $this->username;
    }
    
    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Add categorias
     *
     * @param MySite\DataBaseBundle\Entity\Categoria $categorias
     */
    public function addCategoria(\MySite\DataBaseBundle\Entity\Categoria $categorias)
    {
        $this->categorias[] = $categorias;
    }

    /**
     * Get categorias
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCategorias()
    {
        return $this->categorias;
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

    /**
     * Set capital 
     *
     * @param integer $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    }

    /**
     * Get capital
     *
     * @return integer 
     */
    public function getCapital()
    {
        return $this->capital;
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