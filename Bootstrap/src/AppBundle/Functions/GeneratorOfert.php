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
    public $miasto=Array('Lublin','Zamosc','Chelm','Świdnik','Puławy');
    public $dzielnica=Array('Czuby','Czechów','Śródmieście','Tatary','Dziesiąta','Kalinowszczyzna');

    function make_seed()
    {
        list($usec, $sec) = explode(' ', microtime());
        return (float) $sec + ((float) $usec * 100000);
    }
    public function getCena()
    {
        mt_srand($this->make_seed());
        return mt_rand(50,250)*10;
    }
    public function getLiczbaPokoi()
    {
        mt_srand($this->make_seed());
        return mt_rand(1,4);
    }
    public function getMaksLiczbaOsob()
    {
        mt_srand($this->make_seed());
        return mt_rand(1,6);
    }
    public function getMetraz()
    {
        mt_srand($this->make_seed());
        return mt_rand(15,110);
    }
    public function getMiasto()
    {
        mt_srand($this->make_seed());
        $i=mt_rand(0,9);
        switch ($i)
        {
            case 0:
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
                return $this->miasto[0];
                break;
            case 6:
                return $this->miasto[1];
                break;
            case 7:
                return $this->miasto[2];
                break;
            case 8:
                return $this->miasto[3];
                break;
            case 9:
                return $this->miasto[4];
                break;

        }
    }
    public function getDzielnica()
    {
        mt_srand($this->make_seed());
        $i=mt_rand(0,5);
        switch ($i)
        {
            case 0:
                return $this->dzielnica[0];
                break;
            case 1:
                return $this->dzielnica[1];
                break;
            case 2:
                return $this->dzielnica[2];
                break;
            case 3:
                return $this->dzielnica[3];
                break;
            case 4:
                return $this->dzielnica[4];
                break;
            case 5:
                return $this->dzielnica[5];
                break;

        }
    }
    public function getPietro()
    {
        mt_srand($this->make_seed());
        return mt_rand(0,10);
    }


}