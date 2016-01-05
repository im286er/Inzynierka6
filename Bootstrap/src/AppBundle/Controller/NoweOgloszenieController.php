<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Oferty;
use AppBundle\Entity\Preferencje_Oferty;
use AppBundle\Entity\Preferencje;
use AppBundle\Entity\Zdjecia;
use AppBundle\Entity\Wyposazenie_Oferty;
use AppBundle\Entity\Wyposazenie_Oferty_Oferty;
use AppBundle\Entity\Wyposazenie;
use AppBundle\Form\NoweOgloszenie;
use Symfony\Component\Finder\Finder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Tests\Fixtures\Entity;


class NoweOgloszenieController extends Controller
{

    private function checkPreferencje($string,$Oferta)
    {

        $Preferencje_Oferty = new Preferencje_Oferty();
        $Preferencje_Oferty->setOferta($Oferta);
        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Preferencje');
        $Preferencje_Oferty->setPreferencja($Repository->findOneBy(
            array('TypPreferencji' => $string)
        ));
        $em = $this->getDoctrine()->getManager();
        $em->persist($Preferencje_Oferty);
        $em->flush();
    }
    private function checkWyposazenie($string,$Oferta)
    {

        $Wyposazenie_Oferty = new Wyposazenie_Oferty();
        $Wyposazenie_Oferty->setOferta($Oferta);
        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Wyposazenie');
        $Wyposazenie_Oferty->setWyposazenie($Repository->findOneBy(
            array('nazwawyposazenia' => $string)
        ));
        $em = $this->getDoctrine()->getManager();
        $em->persist($Wyposazenie_Oferty);
        $em->flush();
    }
    /**
     * @Route("/NoweOgloszenie", name="NoweOgloszenie")
     */

    public function newAction(Request $request)
    {
        $task = new Oferty();

        $form = $this->createForm(new NoweOgloszenie());
        $form->handleRequest($request);

        if ($form->isValid()) {




            $data = $form->getData();
            $Oferta = new Oferty();
            $Oferta->setTytul($data["tytul"]);
            $Oferta->setWolneod($data["wolneod"]);
            $Oferta->setMiasto($data["miasto"]);
            $Oferta->setDzielnica($data["dzielnica"]);
            $Oferta->setUlica($data["ulica"]);
            $Oferta->setPietro($data["pietro"]);
            $Oferta->setLiczbapokoi($data["liczbapokoi"]);
            $Oferta->setMaksliczbosob($data["maksliczbaosob"]);
            $Oferta->setMetraz($data["metraz"]);
            $Oferta->setCena($data["cenazamiesiac"]);
            $Oferta->setDodatkoweoplaty($data["dodatkoweoplaty"]);
            $Oferta->setKaucja($data["kaucja"]);
            $Oferta->setUserId($this->getUser());
            $Oferta->setOpis($data["dodatkoweinformacje"]);
            $Oferta->setKategoria($data["typstancji"]);
            $Oferta->setTyp($data["typbudynku"]);

            $Oferta->setWyslano();
            $em = $this->getDoctrine()->getManager();
            $em->persist($Oferta);
            $em->flush();

            //sprawdzam preferencje
            if($data['kobiety']==true)
            {
             $this->checkPreferencje('kobiety',$Oferta);
            }
            if($data['mezczyzni']==true)
            {
                $this->checkPreferencje('mezczyzni',$Oferta);
            }
            if($data['palacy']==true)
            {
                $this->checkPreferencje('palacy',$Oferta);
            }
            if($data['studenci']==true)
            {
                $this->checkPreferencje('studenci',$Oferta);
            }
            if($data['pary']==true)
            {
                $this->checkPreferencje('pary',$Oferta);
            }
            if($data['pracujacy']==true)
            {
                $this->checkPreferencje('pracujacy',$Oferta);
            }
            //sprawdzam wyposazenie
            if($data['internet']==true)
            {
                $this->checkWyposazenie('internet',$Oferta);
            }
            if($data['telefon']==true)
            {
                $this->checkWyposazenie('telefon',$Oferta);
            }
            if($data['telewizor']==true)
            {
                $this->checkWyposazenie('telewizor',$Oferta);
            }
            if($data['kablowka']==true)
            {
                $this->checkWyposazenie('kablowka',$Oferta);
            }
            if($data['pralka']==true)
            {
                $this->checkWyposazenie('pralka',$Oferta);
            }
            if($data['lodowka']==true)
            {
                $this->checkWyposazenie('lodowka',$Oferta);
            }
            if($data['prysznic']==true)
            {
                $this->checkWyposazenie('prysznic',$Oferta);
            }
            if($data['wanna']==true)
            {
                $this->checkWyposazenie('wanna',$Oferta);
            }
            if($data['balkon']==true)
            {
                $this->checkWyposazenie('balkon',$Oferta);
            }
            if($data['taras']==true)
            {
                $this->checkWyposazenie('taras',$Oferta);
            }
            if($data['parking']==true)
            {
                $this->checkWyposazenie('parking',$Oferta);
            }
            if($data['garaz']==true)
            {
                $this->checkWyposazenie('garaz',$Oferta);
            }

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $manager = $this->get('oneup_uploader.orphanage_manager')->get('gallery');
            $finder=$manager->getFiles();

            foreach($finder as $file)
            {
                $Zdjecie = new Zdjecia();
                $Zdjecie->setOferta($Oferta);
                $Zdjecie->setImageName($file->getRelativePathname());
                $em = $this->getDoctrine()->getManager();
                $em->persist($Zdjecie);
                $em->flush();
            }
            $manager->uploadFiles(iterator_to_array($finder),$Oferta->getIdOferty());


            return $this->redirectToRoute('_oferta',array('idOferty' => $Oferta->getIdOferty()));
        }

        return $this->render(':Szablony:noweogloszenie.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}