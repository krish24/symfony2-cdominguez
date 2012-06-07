<?php

namespace MySite\DataBaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MySite\DataBaseBundle\Entity\Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="MySite\DataBaseBundle\Repository\UsuarioRepository")
 */
class Usuario
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
     * @var string $logonName
     *
     * @ORM\Column(name="logonname", type="string", length=255)
     */
    private $logonName;
    
    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=20)
     */
    private $password;
    
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=200)
     */
    private $email;
    
    /**
     * @ORM\OneToMany(targetEntity="Gasto", mappedBy="usuario", cascade={"persist"})
     */
    private $gastos;
    
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
     * Set logonName
     *
     * @param string $logonName
     */
    public function setLogonName($logonName)
    {
        $this->logonName = $logonName;
    }

    /**
     * Get logonName
     *
     * @return string 
     */
    public function getLogonName()
    {
        return $this->logonName;
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
}