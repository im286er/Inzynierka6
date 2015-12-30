<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2015-12-14
 * Time: 22:25
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity
 */
class Zdjecia
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="string", length=255 )
     *
     * @var string
     */
    private $imagePath;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Oferty")
     * @ORM\JoinColumn(name="oferta", referencedColumnName="idOferty")
     */
    public $oferta;



    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
        $this->setImagePath();
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }
    /**
     * @return string
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }
    /**
     * @param string $imageName
     */
    public function setImagePath()
    {

        $this->imagePath = '/uploads/gallery/'.$this->getOferta().'/'.$this->getImageName();
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
