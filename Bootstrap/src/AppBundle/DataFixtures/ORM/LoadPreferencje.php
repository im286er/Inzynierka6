<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2015-11-24
 * Time: 18:12
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Preferencje;

class LoadPreferencje implements FixtureInterface
{
    private function addPreference($string,ObjectManager $manager )
    {
        $preferencja = new Preferencje();
        $preferencja->setTypPreferencji($string);
        $manager->persist($preferencja);
    }
    public function load(ObjectManager $manager)
    {
       $this->addPreference("kobiety",$manager);
       $this->addPreference('meżczyźni',$manager);
       $this->addPreference('palący',$manager);
       $this->addPreference('studenci',$manager);
       $this->addPreference('pary',$manager);
       $this->addPreference('pracujący',$manager);

        $manager->flush();
    }
}