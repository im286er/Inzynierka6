<?php
/**
 * Created by PhpStorm.
 * User: Lenin
 * Date: 2015-11-26
 * Time: 16:42
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Wyposazenie;

class LoadWyposazenie implements FixtureInterface, OrderedFixtureInterface
{
    private function addWyposazenie($string,ObjectManager $manager )
    {
        $preferencja = new Wyposazenie();
        $preferencja->setNazwawyposazenia($string);
        $manager->persist($preferencja);
    }
    public function load(ObjectManager $manager)
    {
        $this->addWyposazenie("internet",$manager);
        $this->addWyposazenie("telefon",$manager);
        $this->addWyposazenie("telewizor",$manager);
        $this->addWyposazenie("kablówka",$manager);
        $this->addWyposazenie("pralka",$manager);
        $this->addWyposazenie("lodówka",$manager);
        $this->addWyposazenie("prysznic",$manager);
        $this->addWyposazenie("wanna",$manager);
        $this->addWyposazenie("balkon",$manager);
        $this->addWyposazenie("taras",$manager);
        $this->addWyposazenie("parking",$manager);
        $this->addWyposazenie("garaż",$manager);

        $manager->flush();
    }
    public function getOrder()
    {
        return 3;
    }
}