<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2016-01-04
 * Time: 18:57
 */


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="komentarze")
 */
class Komentarze
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="komentujacy")
     * @ORM\JoinColumn(name="user_komentujacy", referencedColumnName="id")
     */
    protected $user_komentujacy;

    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="komentowany")
     * @ORM\JoinColumn(name="user_profil", referencedColumnName="id")
     */
    protected $user_profil;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    protected $komentarz;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userKomentujacy
     *
     * @param \AppBundle\Entity\User $userKomentujacy
     *
     * @return Komentarze
     */
    public function setUserKomentujacy(\AppBundle\Entity\User $userKomentujacy = null)
    {
        $this->user_komentujacy = $userKomentujacy;

        return $this;
    }

    /**
     * Get userKomentujacy
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserKomentujacy()
    {
        return $this->user_komentujacy;
    }

    /**
     * Set userProfil
     *
     * @param \AppBundle\Entity\User $userProfil
     *
     * @return Komentarze
     */
    public function setUserProfil(\AppBundle\Entity\User $userProfil = null)
    {
        $this->user_profil = $userProfil;

        return $this;
    }

    /**
     * Get userProfil
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserProfil()
    {
        return $this->user_profil;
    }

    /**
     * Set komentarz
     *
     * @param string $komentarz
     *
     * @return Komentarze
     */
    public function setKomentarz($komentarz)
    {
        $this->komentarz = $komentarz;

        return $this;
    }

    /**
     * Get komentarz
     *
     * @return string
     */
    public function getKomentarz()
    {
        return $this->komentarz;
    }
}
