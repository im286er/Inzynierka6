<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2016-01-11
 * Time: 16:44
 */
namespace AppBundle\Functions;

class GeneratorOfert
{
    private $tablicamiast=Array('Lublin','Zamość','Chełm','Świdnik','Puławy');
    private $tablicadzielnic=Array('Czuby','Czechów','Śródmieście','Tatary','Dziesiąta','Kalinowszczyzna');
    private $tablicaulic=Array('3 maja','Armii Krajowej','Mickiewicza','Długa','Kościuszki','Słowackiego','Mikołaja Kopernika','Spokojna',
                                'Piłsudskiego','Ogrodowa','Wiejska','Warszawska','Jana Pawła II','Leśna','Lipowa','Wesoła','Ludowa','Letnia',
                                'Fabryczna','Gęsia','Różana','Strażacka','Fabryczna','Targowa');

    private $miasto='Lublin';
    private $dzielnica='Śródmieście';
    private $cena=900;
    private $kategoria='Mieszkanie';
    private $maksliczbaosob=2;


    function make_seed()
    {
        list($usec, $sec) = explode(' ', microtime());
        return (float) $sec + ((float) $usec * 100000);
    }
    public function getCena()
    {
        mt_srand($this->make_seed());
        $this->cena=mt_rand(10,50)*50;
        return $this->cena;
    }
    public function getKategoria()
    {
        mt_srand($this->make_seed());
        $i=mt_rand(0,3);
        switch ($i)
        {
            case 0:
                $this->kategoria='Pokój';
                return $this->kategoria;
                break;
            case 1:
                $this->kategoria='Miejsce w pokoju';
                return $this->kategoria;
                break;
            case 2:
                $this->kategoria='Mieszkanie';
                return $this->kategoria;
                break;
            case 3:
                $this->kategoria='Kawalerka';
                return $this->kategoria;
                break;

        }
    }
    public function getLiczbaPokoi()
    {
        mt_srand($this->make_seed());
        return mt_rand(1,4);
    }
    public function getMaksLiczbaOsob()
    {
        mt_srand($this->make_seed());
        $this->maksliczbaosob=mt_rand(1,6);
        return $this->maksliczbaosob;
    }
    public function getMetraz()
    {
        mt_srand($this->make_seed());
        return mt_rand(15,110);
    }
    public function getMiasto()
    {
        mt_srand($this->make_seed());
        $i = mt_rand(1, count($this->tablicamiast) * 3);

        if ($i >= count($this->tablicamiast)) {
            $this->miasto = $this->tablicamiast[0];
            return $this->tablicamiast[0];
        } else {
            $this->miasto = $this->tablicamiast[$i];
            return $this->tablicamiast[$i];
        }
    }
    public function getDzielnica()
    {
        mt_srand($this->make_seed());
        $i=mt_rand(0,count($this->tablicadzielnic)-1);
        $this->dzielnica=$this->tablicadzielnic[$i];
        return $this->tablicadzielnic[$i];
    }
    public function getNumer()
    {
        mt_srand($this->make_seed());
        return mt_rand(1,5);
    }
    public function getPietro()
    {
        mt_srand($this->make_seed());
        return mt_rand(0,10);
    }
    public function getTyp()
    {
        mt_srand($this->make_seed());
        $i=mt_rand(0,2);
        switch ($i)
        {
            case 0:
                return 'Blok';
                break;
            case 1:
                return 'Kamienica';
                break;
            case 2:
                return 'Jednorodzinny';
                break;
        }
    }
    public function getTytuł()
    {
        mt_srand($this->make_seed());
        $i=mt_rand(0,8);
        switch ($i)
        {
            case 0:
                return 'Wynajmę super stancję w '.$this->miasto;
                break;
            case 1:
                return 'Wygodna stancja w dzielnicy '.$this->dzielnica;
                break;
            case 2:
                return $this->kategoria.' do wynajęcia dla studenta';
                break;
            case 3:
            case 4:
                if($this->cena<1100)
                return 'Tania stancja!';
                else if($this->cena>1900)
                return 'Eklsuzywna stancja w rozsądnej cenie';
                else
                return 'Przytulna stancja do wynajęcia';
                break;
            case 5:
            case 6:
                if($this->maksliczbaosob>4)
                    return 'Do wynajęcia dla całej rodziny!';
                else if($this->maksliczbaosob==2)
                    return 'Wynajmę stancję dla osoby samotnej lub pary';
                else
                    return 'Komfortowa stancja w dogodnej lokalizacji';
                break;
            case 7:
                 return $this->kategoria.' do wynajęcia od zaraz w dzielnicy '.$this->dzielnica;
                break;
            case 8:
                 return 'Wynajmę '.$this->kategoria.', komfortowe warunki w rozsądnej cenie!';
                break;



        }
    }
    public function getUlica()
    {
        mt_srand($this->make_seed());
        $i=mt_rand(0,count($this->tablicaulic)-1);
        return $this->tablicaulic[$i];
    }
    public function getUser()
    {
        mt_srand($this->make_seed());
       $i=mt_rand(0,1);
        switch ($i)
        {
            case 0:
                return 'user';
                break;
            case 1:
                return 'admin';
                break;

        }
    }

    public function getWygasa()
    {
        mt_srand($this->make_seed());
        $i=mt_rand(0,2);
        switch ($i)
        {
            case 0:
                return 14;
                break;
            case 1:
                return 30;
                break;
            case 2:
                return 60;
                break;

        }
    }
}