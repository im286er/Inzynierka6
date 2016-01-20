<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2015-12-31
 * Time: 17:54
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="obserwowane")
 */
class Obserwowane
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="Oferty",inversedBy="obserwowane")
     * @ORM\JoinColumn(name="oferta", referencedColumnName="id_oferty", onDelete="CASCADE")
     */
    protected $oferta;

    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="obserwowane")
     * @ORM\JoinColumn(name="user", referencedColumnName="id", nullable=true)
     */
    protected $user;

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
     * Set oferta
     *
     * @param integer $oferta
     *
     * @return Obserwowane
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
     * Set User
     *
     * @param User $user
     *
     * @return User
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get User
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __toString() {
        return (string) $this->oferta;
    }


}
