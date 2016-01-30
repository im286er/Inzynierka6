<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\OneToMany(targetEntity="Obserwowane", mappedBy="user")
     */
    public $obserwowane;

    /**
     * @ORM\OneToMany(targetEntity="Komentarze", mappedBy="user_komentujacy")
     */
    public $komentujacy;
    /**
     * @ORM\OneToMany(targetEntity="Komentarze", mappedBy="user_profil")
     */
    public $komentowany;






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

    public function __construct()
    {
        parent::__construct();
        $this->obserwowane = new ArrayCollection;
        $this->komentowany = new ArrayCollection;
    }

    /**
     * Get obserwowane
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObserwowane ()
    {
        return $this->obserwowane ;
    }


    public function setObserwowane (ArrayCollection $obserwowane )
    {
        $this->obserwowane  = $obserwowane ;

        return $this;
    }

    /**
     * Add Obserwowane
     *
     * @param Obserwowane $obserwowane
     * @return Obserwowane
     */
    public function addObserwowane (Obserwowane $obserwowane )
    {
        $this->obserwowane[] = $obserwowane;

        return $this;
    }

    /**
     * Remove Obserwowane
     *
     * @param Obserwowane $obserwowane
     */
    public function removeObserwowane(Obserwowane $obserwowane)
    {
        $this->obserwowane->removeElement($obserwowane);
    }

    /**
     * Get komentowany
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKomentowany ()
    {
        return $this->komentowany ;
    }


    public function setKomentowany (ArrayCollection $komentowany )
    {
        $this->komentowany  = $komentowany ;

        return $this;
    }


    /**
     * Remove Komentowany
     *
     * @param Komentarze $komentowany
     */
    public function removeKomentowany(komentarze $komentowany)
    {
        $this->komentarze->removeElement($komentowany);
    }

}
