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
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Oferty")
     * @ORM\JoinColumn(name="oferta", referencedColumnName="idOferty")
     */
    protected $oferta;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Preferencje")
     * @ORM\JoinColumn(name="preferencja", referencedColumnName="idPreferencje")
     */
    protected $preferencja;





  

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
     * @param integer $oferta
     *
     * @return Preferencje_Oferty
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
     * Set preferencja
     *
     * @param integer $preferencja
     *
     * @return Preferencje_Oferty
     */
    public function setPreferencja($preferencja)
    {
        $this->preferencja = $preferencja;
    
        return $this;
    }

    /**
     * Get preferencja
     *
     * @return integer
     */
    public function getPreferencja()
    {
        return $this->preferencja;
    }
}
