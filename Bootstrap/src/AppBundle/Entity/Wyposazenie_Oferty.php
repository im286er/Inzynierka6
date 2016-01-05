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
     * @ORM\ManyToOne(targetEntity="Oferty",inversedBy="wyposazenie")
     * @ORM\JoinColumn(name="oferta", referencedColumnName="id_oferty", onDelete="CASCADE")
     */
    protected $oferta;

    /**
     * @ORM\ManyToOne(targetEntity="Wyposazenie",inversedBy="oferta")
     * @ORM\JoinColumn(name="wyposazenie", referencedColumnName="idwyposazenie", onDelete="CASCADE")
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
    public function __toString() {
        return (string) $this->idWyposazenie;
    }
}
