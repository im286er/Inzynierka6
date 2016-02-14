<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2015-11-24
 * Time: 19:02
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="preferencje_oferty")
 */
class Preferencje_Oferty
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idPreferencje;


    /**
     * @ORM\ManyToOne(targetEntity="Oferty",inversedBy="preferencja")
     * @ORM\JoinColumn(name="oferta", referencedColumnName="id_oferty", onDelete="CASCADE")
     */
    protected $oferta;

    /**
     * @ORM\ManyToOne(targetEntity="Preferencje",inversedBy="oferta")
     * @ORM\JoinColumn(name="preferencja", referencedColumnName="id_preferencje", onDelete="CASCADE")
     */
    public $preferencja;

    public function __toString() {
        return (string) $this->idPreferencje;
    }

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
     * Set oferta
     *
     * @param \AppBundle\Entity\Oferty $oferta
     *
     * @return Preferencje_Oferty
     */
    public function setOferta(\AppBundle\Entity\Oferty $oferta = null)
    {
        $this->oferta = $oferta;

        return $this;
    }

    /**
     * Get oferta
     *
     * @return \AppBundle\Entity\Oferty
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set preferencja
     *
     * @param \AppBundle\Entity\Preferencje $preferencja
     *
     * @return Preferencje_Oferty
     */
    public function setPreferencja(\AppBundle\Entity\Preferencje $preferencja = null)
    {
        $this->preferencja = $preferencja;

        return $this;
    }

    /**
     * Get preferencja
     *
     * @return \AppBundle\Entity\Preferencje
     */
    public function getPreferencja()
    {
        return $this->preferencja;
    }
}
