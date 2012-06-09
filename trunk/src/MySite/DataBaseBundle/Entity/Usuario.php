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
     * @ORM\Column(name="password", type="string", length=20)
     */
    private $password;
    
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     */
    private $email;
    
    /**
     * @ORM\OneToMany(targetEntity="Gasto", mappedBy="usuario", cascade={"persist"})
     */
    private $gastos;
    
    public function __construct()
    {
        $this->gastos = new \Doctrine\Common\Collections\ArrayCollection();
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
        return array('ROLE_USER');
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
}