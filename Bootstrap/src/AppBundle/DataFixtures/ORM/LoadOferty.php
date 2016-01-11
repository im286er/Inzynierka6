<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2016-01-11
 * Time: 16:40
 */

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Oferty;
use AppBundle\Functions\GeneratorOfert;


class LoadOferty implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    private function addOferta(ObjectManager $manager )
    {

        //  $gen->ge
        // $oferta->se
        $gen=new GeneratorOfert();
        $oferta = new Oferty();
        $oferta->setMiasto($gen->getMiasto());
        $oferta->setUlica('Głęboka');
        $oferta->setKategoria('Pokój');
        $oferta->setCena($gen->getCena());
        $oferta->setDzielnica($gen->getDzielnica());
        $oferta->setLiczbapokoi($gen->getLiczbaPokoi());
        $oferta->setMaksliczbosob($gen->getMaksLiczbaOsob());
        $oferta->setMetraz($gen->getMetraz());
        $oferta->setPietro($gen->getPietro());
        $oferta->setTyp('Blok');
        $oferta->setWolneod(new \DateTime("now"));
        $oferta->setWyslano();
        $oferta->setTytul('Wynajme super stancje w '.$oferta->getMiasto());

        $Repository = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:User');

        $user=$Repository->findOneBy(
            array('username' =>'admin'));

        $oferta->setUserId($user);
        $manager->persist($oferta);
    }


    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 20; $i++)
        {
            $this->AddOferta($manager);
        }       

        $manager->flush();
    }
    public function getOrder()
    {
        return 5;
    }
}