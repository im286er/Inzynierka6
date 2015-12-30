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
}
