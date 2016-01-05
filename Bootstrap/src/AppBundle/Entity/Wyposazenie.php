<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2015-11-26
 * Time: 16:31
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="wyposazenie")
 */
class Wyposazenie
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idwyposazenie;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nazwawyposazenia;

    /**
     * @ORM\OneToMany(targetEntity="Wyposazenie_Oferty", mappedBy="wyposazenie")
     */
    protected $oferta;


    /**
     * Get idwyposazenie
     *
     * @return integer
     */
    public function getIdwyposazenie()
    {
        return $this->idwyposazenie;
    }

    /**
     * Set nazwawyposazenia
     *
     * @param string $nazwawyposazenia
     *
     * @return Wyposazenie
     */
    public function setNazwawyposazenia($nazwawyposazenia)
    {
        $this->nazwawyposazenia = $nazwawyposazenia;
    
        return $this;
    }

    /**
     * Get nazwawyposazenia
     *
     * @return string
     */
    public function getNazwawyposazenia()
    {
        return $this->nazwawyposazenia;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->oferta = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ofertum
     *
     * @param \AppBundle\Entity\Wyposazenie_Oferty $ofertum
     *
     * @return Wyposazenie
     */
    public function addOfertum(\AppBundle\Entity\Wyposazenie_Oferty $ofertum)
    {
        $this->oferta[] = $ofertum;

        return $this;
    }

    /**
     * Remove ofertum
     *
     * @param \AppBundle\Entity\Wyposazenie_Oferty $ofertum
     */
    public function removeOfertum(\AppBundle\Entity\Wyposazenie_Oferty $ofertum)
    {
        $this->oferta->removeElement($ofertum);
    }

    /**
     * Get oferta
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOferta()
    {
        return $this->oferta;
    }
}
