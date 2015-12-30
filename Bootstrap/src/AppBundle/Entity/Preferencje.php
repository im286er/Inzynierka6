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
}
