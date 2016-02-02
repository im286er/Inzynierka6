<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2015-11-19
 * Time: 20:03
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="oferty")
 */
class Oferty
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $idOferty;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $kategoria;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $typ;

    /**
     * @ORM\Column(type="date")
     */
    protected $wolneod;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $tytul;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $miasto;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $dzielnica;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $ulica;

    /**
     * @ORM\Column(type="integer", )
     */
    protected $numer;

    /**
    * @ORM\Column(type="smallint")
    */
    protected $pietro;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $liczbapokoi;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $maksliczbosob;

    /**
     * @ORM\Column(type="integer")
     */
    
    protected $metraz;

    /**
     * @ORM\Column(type="integer")
     */

    protected $cena;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */

    protected $dodatkoweoplaty;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */

    protected $kaucja;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    protected $opis;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user_id;

    /**
     * @ORM\Column(type="datetime")
     */
    public $wyslano;

    /**
     * @ORM\OneToMany(targetEntity="Wyposazenie_Oferty", mappedBy="oferta")
     */
    protected $wyposazenie;

    /**
     * @ORM\OneToMany(targetEntity="Preferencje_Oferty", mappedBy="oferta")
     */
    protected $preferencja;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $views;

    /**
     * @ORM\OneToMany(targetEntity="Obserwowane", mappedBy="oferta", cascade={"persist", "remove"})
     */
    protected $obserwowane;
    /**
     * @ORM\OneToMany(targetEntity="Zdjecia", mappedBy="oferta")
     */
    protected $zdjecia;

    /**
    * @ORM\Column(type="decimal", nullable=true, precision=15, scale=12)
    */
    protected $longitude;
    /**
     * @ORM\Column(type="decimal", nullable=true, precision=15, scale=12)
     */
    protected $latitude;
    /**
     * @ORM\Column(type="date")
     */
    protected $wygasa;

    /**
     * Get idOferty
     *
     * @return integer
     */
    public function getIdOferty()
    {
        return $this->idOferty;
    }

    /**
     * Set miasto
     *
     * @param string $miasto
     *
     * @return Oferty
     */
    public function setMiasto($miasto)
    {
        $this->miasto = $miasto;
    
        return $this;
    }

    /**
     * Get miasto
     *
     * @return string
     */
    public function getMiasto()
    {
        return $this->miasto;
    }

    /**
     * Set ulica
     *
     * @param string $ulica
     *
     * @return Oferty
     */
    public function setUlica($ulica)
    {
        $this->ulica = $ulica;
    
        return $this;
    }

    /**
     * Get ulica
     *
     * @return string
     */
    public function getUlica()
    {
        return $this->ulica;
    }

    /**
     * Set numer
     *
     * @param string $numer
     *
     * @return Oferty
     */
    public function setNumer($numer)
    {
        $this->numer = $numer;
    
        return $this;
    }

    /**
     * Get numer
     *
     * @return string
     */
    public function getNumer()
    {
        return $this->numer;
    }

    /**
     * Set dzielnica
     *
     * @param string $dzielnica
     *
     * @return Oferty
     */
    public function setDzielnica($dzielnica)
    {
        $this->dzielnica = $dzielnica;
    
        return $this;
    }

    /**
     * Get dzielnica
     *
     * @return string
     */
    public function getDzielnica()
    {
        return $this->dzielnica;
    }

    /**
     * Set pietro
     *
     * @param integer $pietro
     *
     * @return Oferty
     */
    public function setPietro($pietro)
    {
        $this->pietro = $pietro;
    
        return $this;
    }

    /**
     * Get pietro
     *
     * @return integer
     */
    public function getPietro()
    {
        return $this->pietro;
    }

    /**
     * Set liczbapokoi
     *
     * @param integer $liczbapokoi
     *
     * @return Oferty
     */
    public function setLiczbapokoi($liczbapokoi)
    {
        $this->liczbapokoi = $liczbapokoi;
    
        return $this;
    }

    /**
     * Get liczbapokoi
     *
     * @return integer
     */
    public function getLiczbapokoi()
    {
        return $this->liczbapokoi;
    }

    /**
     * Set maksliczbosob
     *
     * @param integer $maksliczbosob
     *
     * @return Oferty
     */
    public function setMaksliczbosob($maksliczbosob)
    {
        $this->maksliczbosob = $maksliczbosob;
    
        return $this;
    }

    /**
     * Get maksliczbosob
     *
     * @return integer
     */
    public function getMaksliczbosob()
    {
        return $this->maksliczbosob;
    }

    /**
     * Set metraz
     *
     * @param integer $metraz
     *
     * @return Oferty
     */
    public function setMetraz($metraz)
    {
        $this->metraz = $metraz;
    
        return $this;
    }

    /**
     * Get metraz
     *
     * @return integer
     */
    public function getMetraz()
    {
        return $this->metraz;
    }

    /**
     * Set cena
     *
     * @param integer $cena
     *
     * @return Oferty
     */
    public function setCena($cena)
    {
        $this->cena = $cena;
    
        return $this;
    }

    /**
     * Get cena
     *
     * @return integer
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * Set dodatkoweoplaty
     *
     * @param integer $dodatkoweoplaty
     *
     * @return Oferty
     */
    public function setDodatkoweoplaty($dodatkoweoplaty)
    {
        $this->dodatkoweoplaty = $dodatkoweoplaty;
    
        return $this;
    }

    /**
     * Get dodatkoweoplaty
     *
     * @return integer
     */
    public function getDodatkoweoplaty()
    {
        return $this->dodatkoweoplaty;
    }

    /**
     * Set kaucja
     *
     * @param integer $kaucja
     *
     * @return Oferty
     */
    public function setKaucja($kaucja)
    {
        $this->kaucja = $kaucja;
    
        return $this;
    }

    /**
     * Get kaucja
     *
     * @return integer
     */
    public function getKaucja()
    {
        return $this->kaucja;
    }

    /**
     * Set wolneod
     *
     * @param \DateTime $wolneod
     *
     * @return Oferty
     */
    public function setWolneod($wolneod)
    {
        $this->wolneod = $wolneod;
    
        return $this;
    }

    /**
     * Get wolneod
     *
     * @return \DateTime
     */
    public function getWolneod()
    {
        return $this->wolneod;
    }



    /**
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     *
     * @return Oferty
     */
    public function setUserId(\AppBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set wyslano
     *
     * @param \DateTime $wyslano
     *
     * @return Oferty
     */
    public function setWyslano()
    {
        $this->wyslano = new \DateTime("now");
    
        return $this;
    }

    /**
     * Get wyslano
     *
     * @return \DateTime
     */
    public function getWyslano()
    {
        return $this->wyslano;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->wyposazenie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->preferencja = new ArrayCollection;
    }

    /**
     * Set opis
     *
     * @param string $opis
     *
     * @return Oferty
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;
    
        return $this;
    }

    /**
     * Get opis
     *
     * @return string
     */
    public function getOpis()
    {
        return $this->opis;
    }

    
    /**
     * Set tytul
     *
     * @param string $tytul
     *
     * @return Oferty
     */
    public function setTytul($tytul)
    {
        $this->tytul = $tytul;
    
        return $this;
    }

    /**
     * Get tytul
     *
     * @return string
     */
    public function getTytul()
    {
        return $this->tytul;
    }

    /**
     * Set kategoria
     *
     * @param string $kategoria
     *
     * @return Oferty
     */
    public function setKategoria($kategoria)
    {
        $this->kategoria = $kategoria;

        return $this;
    }

    /**
     * Get kategoria
     *
     * @return string
     */
    public function getKategoria()
    {
        return $this->kategoria;
    }

    /**
     * Set views
     *
     * @param integer $views
     *
     * @return Oferty
     */
    public function setViews($views)
    {
        $this->views = $views;
    
        return $this;
    }

    /**
     * Get views
     *
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set typ
     *
     * @param string $typ
     *
     * @return Oferty
     */
    public function setTyp($typ)
    {
        $this->typ = $typ;

        return $this;
    }

    /**
     * Get typ
     *
     * @return string
     */
    public function getTyp()
    {
        return $this->typ;
    }

    /**
     * Add wyposazenie
     *
     * @param \AppBundle\Entity\Wyposazenie_Oferty $wyposazenie
     *
     * @return Oferty
     */
    public function addWyposazenie(\AppBundle\Entity\Wyposazenie_Oferty $wyposazenie)
    {
        $this->wyposazenie[] = $wyposazenie;

        return $this;
    }

    /**
     * Remove wyposazenie
     *
     * @param \AppBundle\Entity\Wyposazenie_Oferty $wyposazenie
     */
    public function removeWyposazenie(\AppBundle\Entity\Wyposazenie_Oferty $wyposazenie)
    {
        $this->wyposazenie->removeElement($wyposazenie);
    }

    /**
     * Get wyposazenie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWyposazenie()
    {
        return $this->wyposazenie;
    }

    /**
     * Add preferencja
     *
     * @param \AppBundle\Entity\Preferencje_Oferty $preferencja
     *
     * @return Oferty
     */
    public function addPreferencja(\AppBundle\Entity\Preferencje_Oferty $preferencja)
    {
        $this->preferencja[] = $preferencja;

        return $this;
    }

    /**
     * Remove preferencja
     *
     * @param \AppBundle\Entity\Preferencje_Oferty $preferencja
     */
    public function removePreferencja(\AppBundle\Entity\Preferencje_Oferty $preferencja)
    {
        $this->preferencja->removeElement($preferencja);
    }

    /**
     * Get preferencja
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPreferencja()
    {
        return $this->preferencja;
    }

    /**
     * Add obserwowane
     *
     * @param \AppBundle\Entity\Obserwowane $obserwowane
     *
     * @return Oferty
     */
    public function addObserwowane(\AppBundle\Entity\Obserwowane $obserwowane)
    {
        $this->obserwowane[] = $obserwowane;

        return $this;
    }

    /**
     * Remove obserwowane
     *
     * @param \AppBundle\Entity\Obserwowane $obserwowane
     */
    public function removeObserwowane(\AppBundle\Entity\Obserwowane $obserwowane)
    {
        $this->obserwowane->removeElement($obserwowane);
    }

    /**
     * Get obserwowane
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObserwowane()
    {
        return $this->obserwowane;
    }

    /**
     * Add zdjecium
     *
     * @param \AppBundle\Entity\Zdjecia $zdjecium
     *
     * @return Oferty
     */
    public function addZdjecium(\AppBundle\Entity\Zdjecia $zdjecium)
    {
        $this->zdjecia[] = $zdjecium;

        return $this;
    }

    /**
     * Remove zdjecium
     *
     * @param \AppBundle\Entity\Zdjecia $zdjecium
     */
    public function removeZdjecium(\AppBundle\Entity\Zdjecia $zdjecium)
    {
        $this->zdjecia->removeElement($zdjecium);
    }

    /**
     * Get zdjecia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getZdjecia()
    {
        return $this->zdjecia;
    }
    public function __toString() {
        return (string) $this->idOferty;
    }



    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Oferty
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function GetLongitude()
    {
        return $this->longitude;
    }

    /**
 * Set latitude
 *
 * @param string $latitude
 *
 * @return Oferty
 */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * Get lat
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
    /**
     * Set latlong
     *
     * @param string $latlong
     *
     * @return Oferty
     */
    public function setLatLong()
    {
        $curl     = new \Ivory\HttpAdapter\CurlHttpAdapter();
        // get curl config
        $conf = $curl->getConfiguration();

// set timeout
        $conf->setTimeout(1000);

// save config
        $curl->setConfiguration($conf);
        $geocoder = new \Geocoder\Provider\GoogleMaps($curl);
        $adress=$geocoder->geocode($this->miasto.' '.$this->ulica.' '.$this->numer);
        if($adress->count()!=0) {
            $this->longitude = $adress->first()->getLongitude();
            $this->latitude = $adress->first()->getLatitude();
        }
        else
        {
            $this->longitude=300;
            $this->latitude=300;
        }

        return $this;
    }

    /**
     * Set wygasa
     *
     * @param integer $wygasa
     *
     * @return Oferty
     */
    public function setWygasa($wygasa)
    {

        $d1 = new \DateTime();
        $d2 = $wygasa*24*60*60;

        $this->wygasa= $d1->setTimestamp($this->wyslano->getTimestamp()+$d2);
        return $this;
    }

    /**
     * Get wygasa
     *
     * @return \DateTime
     */
    public function getWygasa()
    {
        return $this->wygasa;
    }
}
