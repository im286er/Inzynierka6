<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    public $imie;

    /**
     * @ORM\Column(type="string", length=45)
     */
    public $nazwisko;

    /**
     * @ORM\Column(type="integer", nullable=true, length=13)
     */
    public $telefon;

    public $regulamin;






    /**
     * Set imie
     *
     * @param string $imie
     *
     * @return User
     */
    public function setImie($imie)
    {
        $this->imie = $imie;
    
        return $this;
    }

    /**
     * Get imie
     *
     * @return string
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     *
     * @return User
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;
    
        return $this;
    }

    /**
     * Get nazwisko
     *
     * @return string
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Set telefon
     *
     * @param integer $telefon
     *
     * @return User
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    
        return $this;
    }

    /**
     * Get telefon
     *
     * @return integer
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

}
