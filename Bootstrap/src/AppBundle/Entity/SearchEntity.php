<?php
namespace AppBundle\Entity;

class SearchEntity
{
    /**
     * @Assert\NotBlank()
     */
    protected $search;

    protected $kategoria;

    protected $Cenaod;

    protected $Cenado;

    protected $metraz;

    public function getsearch()
    {
        return $this->search;
    }

    public function getkategoria(){
        return $this->kategoria;
    }
    public function getCenaod(){
        return $this->Cenaod;
    }
    public function getCenado(){
        return $this->Cenado;
    }
    public function metraz(){
        return $this->Cenado;
    }
}