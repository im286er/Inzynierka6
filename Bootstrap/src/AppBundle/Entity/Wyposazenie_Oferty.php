<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2015-11-26
 * Time: 16:38
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="wyposazenie_oferty")
 */
class Wyposazenie_Oferty
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idWyposazenie;


    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Oferty", inversedBy="oferty")
     * @ORM\JoinColumn(name="oferta", referencedColumnName="idOferty")
     */
    protected $oferta;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Wyposazenie")
     * @ORM\JoinColumn(name="wyposazenie", referencedColumnName="$idwyposazenie")
     */
    protected $wyposazenie;

    /**
     * Get idWyposazenie
     *
     * @return integer
     */
    public function getIdWyposazenie()
    {
        return $this->idWyposazenie;
    }

    /**
     * Set oferta
     *
     * @param integer $oferta
     *
     * @return Wyposazenie_Oferty
     */
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;
    
        return $this;
    }

    /**
     * Get oferta
     *
     * @return integer
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set wyposazenie
     *
     * @param integer $wyposazenie
     *
     * @return Wyposazenie_Oferty
     */
    public function setWyposazenie($wyposazenie)
    {
        $this->wyposazenie = $wyposazenie;
    
        return $this;
    }

    /**
     * Get wyposazenie
     *
     * @return integer
     */
    public function getWyposazenie()
    {
        return $this->wyposazenie;
    }
}
