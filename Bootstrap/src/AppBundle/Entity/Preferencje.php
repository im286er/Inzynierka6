<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2015-11-24
 * Time: 15:42
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="preferencje")
 */
class Preferencje
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idPreferencje;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $TypPreferencji;

    /**
     * @ORM\OneToMany(targetEntity="Preferencje_Oferty", mappedBy="preferencja")
     */
    protected $oferta;


    /**
     * Get idPreferencje
     *
     * @return integer
     */
    public function getIdPreferencje()
    {
        return $this->idPreferencje;
    }

    /**
     * Set typPreferencji
     *
     * @param string $typPreferencji
     *
     * @return Preferencje
     */
    public function setTypPreferencji($typPreferencji)
    {
        $this->TypPreferencji = $typPreferencji;

        return $this;
    }

    /**
     * Get typPreferencji
     *
     * @return string
     */
    public function getTypPreferencji()
    {
        return $this->TypPreferencji;
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
     * @param \AppBundle\Entity\Preferencje_Oferty $ofertum
     *
     * @return Preferencje
     */
    public function addOfertum(\AppBundle\Entity\Preferencje_Oferty $ofertum)
    {
        $this->oferta[] = $ofertum;

        return $this;
    }

    /**
     * Remove ofertum
     *
     * @param \AppBundle\Entity\Preferencje_Oferty $ofertum
     */
    public function removeOfertum(\AppBundle\Entity\Preferencje_Oferty $ofertum)
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
