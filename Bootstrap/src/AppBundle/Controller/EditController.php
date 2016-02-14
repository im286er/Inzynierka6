<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Oferty;
use AppBundle\Entity\Preferencje_Oferty;
use AppBundle\Entity\Preferencje;
use AppBundle\Entity\Zdjecia;
use AppBundle\Entity\Wyposazenie_Oferty;
use AppBundle\Entity\Wyposazenie;
use AppBundle\Form\NoweOgloszenie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class EditController extends Controller
{

    private function checkPreferencje($string,Oferty $oferta,$status)
    {
        $preferencje=$oferta->getPreferencja();
        foreach($preferencje as $pref)
        {
            if(($pref->getPreferencja()->getTypPreferencji()==$string)&&($status==false))
            {
                $Repository = $this->getDoctrine()
                    ->getRepository('AppBundle:Preferencje_Oferty');


                $em = $this->getDoctrine()->getManager();
                $em->remove( $Repository->findOneBy(
                    array('idPreferencje' => $pref->getIdPreferencje())
                ));
                $em->flush();
               return true;
            }
            else if((($pref->getPreferencja()->getTypPreferencji()==$string)&&($status==true)))
            {
               return true;
            }
        }
        if($status==true)
        {
            $Preferencje_Oferty = new Preferencje_Oferty();
            $Preferencje_Oferty->setOferta($oferta);
            $Repository = $this->getDoctrine()
                ->getRepository('AppBundle:Preferencje');
            $Preferencje_Oferty->setPreferencja($Repository->findOneBy(
                array('TypPreferencji' => $string)
            ));
            $em = $this->getDoctrine()->getManager();
            $em->persist($Preferencje_Oferty);
            $em->flush();
            return true;
        }
        return false;
    }
    private function checkWyposazenie($string,Oferty $oferta,$status)
    {
        $wyposazenie=$oferta->getWyposazenie();
        foreach($wyposazenie as $wyp)
        {
            if(($wyp->getWyposazenie()->getNazwawyposazenia()==$string)&&($status==false))
            {
                $Repository = $this->getDoctrine()
                    ->getRepository('AppBundle:Wyposazenie_Oferty');


                $em = $this->getDoctrine()->getManager();
                $em->remove( $Repository->findOneBy(
                    array('idWyposazenie' => $wyp->getIdWyposazenie())
                ));
                $em->flush();
                return true;
            }
            else if((($wyp->getWyposazenie()->getNazwawyposazenia()==$string)&&($status==true)))
            {
                return true;
            }
        }
        if($status==true)
        {
            $Wyposazenie_Oferty = new Wyposazenie_Oferty();
            $Wyposazenie_Oferty->setOferta($oferta);
            $Repository = $this->getDoctrine()
                ->getRepository('AppBundle:Wyposazenie');
            $Wyposazenie_Oferty->setWyposazenie($Repository->findOneBy(
                array('nazwawyposazenia' => $string)
            ));
            $em = $this->getDoctrine()->getManager();
            $em->persist($Wyposazenie_Oferty);
            $em->flush();
        }
        return false;
    }
    private function checkFormPreferencje($string,Oferty $oferta)
    {
        $preferencje=$oferta->getPreferencja();
        foreach($preferencje as $pref)
        {
           if($pref->getPreferencja()->getTypPreferencji()==$string)
           {
               return true;
           }
        }
        return false;
    }
    private function checkFormWyposazenie($string,Oferty $oferta)
    {
        $wyposazenie=$oferta->getWyposazenie();
        foreach($wyposazenie as $wyp)
        {
            if($wyp->getWyposazenie()->getNazwawyposazenia()==$string)
            {
                return true;
            }
        }
        return false;
    }

    public function newAction(Request $request,Oferty $oferta)
    {

        $user = $this->getUser();
        if ((!is_object($user) || !$user instanceof UserInterface) ||($oferta->getUserId()!=$user)){
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->createForm(new NoweOgloszenie());
        $em = $this->getDoctrine()->getManager();

        $form->get('tytul')->setData($oferta->getTytul());
        $form->get('wolneod')->setData($oferta->getWolneod());
        $form->get('miasto')->setData($oferta->getMiasto());
        $form->get('dzielnica')->setData($oferta->getDzielnica());
        $form->get('ulica')->setData($oferta->getUlica());
        $form->get('numer')->setData($oferta->getNumer());
        $form->get('pietro')->setData($oferta->getPietro());
        $form->get('liczbapokoi')->setData($oferta->getLiczbapokoi());
        $form->get('maksliczbaosob')->setData($oferta->getMaksliczbosob());
        $form->get('metraz')->setData($oferta->getMetraz());
        $form->get('cenazamiesiac')->setData($oferta->getCena());
        $form->get('dodatkoweoplaty')->setData($oferta->getDodatkoweoplaty());
        $form->get('kaucja')->setData($oferta->getKaucja());
        $form->get('dodatkoweinformacje')->setData($oferta->getOpis());
        $form->get('typstancji')->setData($oferta->getKategoria());
        $form->get('typbudynku')->setData($oferta->getTyp());
        $form->get('kobiety')->setData($this->checkFormPreferencje('kobiety',$oferta));
        $form->get('mezczyzni')->setData($this->checkFormPreferencje('meżczyźni',$oferta));
        $form->get('palacy')->setData($this->checkFormPreferencje('palący',$oferta));
        $form->get('studenci')->setData($this->checkFormPreferencje('studenci',$oferta));
        $form->get('pary')->setData($this->checkFormPreferencje('pary',$oferta));
        $form->get('pracujacy')->setData($this->checkFormPreferencje('pracujący',$oferta));

        $form->get('internet')->setData($this->checkFormWyposazenie('internet',$oferta));
        $form->get('telefon')->setData($this->checkFormWyposazenie('telefon',$oferta));
        $form->get('telewizor')->setData($this->checkFormWyposazenie('telewizor',$oferta));
        $form->get('kablowka')->setData($this->checkFormWyposazenie('kablówka',$oferta));
        $form->get('pralka')->setData($this->checkFormWyposazenie('pralka',$oferta));
        $form->get('lodowka')->setData($this->checkFormWyposazenie('lodówka',$oferta));
        $form->get('prysznic')->setData($this->checkFormWyposazenie('prysznic',$oferta));
        $form->get('wanna')->setData($this->checkFormWyposazenie('wanna',$oferta));
        $form->get('balkon')->setData($this->checkFormWyposazenie('balkon',$oferta));
        $form->get('taras')->setData($this->checkFormWyposazenie('taras',$oferta));
        $form->get('parking')->setData($this->checkFormWyposazenie('parking',$oferta));
        $form->get('garaz')->setData($this->checkFormWyposazenie('garaż',$oferta));

        $form->handleRequest($request);

        if ($form->isValid()) {

            $data = $form->getData();
            $oferta->setTytul($data["tytul"]);
            $oferta->setWolneod($data["wolneod"]);
            $oferta->setMiasto($data["miasto"]);
            $oferta->setDzielnica($data["dzielnica"]);
            $oferta->setUlica($data["ulica"]);
            $oferta->setNumer($data["numer"]);
            $oferta->setPietro($data["pietro"]);
            $oferta->setLiczbapokoi($data["liczbapokoi"]);
            $oferta->setMaksliczbosob($data["maksliczbaosob"]);
            $oferta->setMetraz($data["metraz"]);
            $oferta->setCena($data["cenazamiesiac"]);
            $oferta->setDodatkoweoplaty($data["dodatkoweoplaty"]);
            $oferta->setKaucja($data["kaucja"]);
            $oferta->setUserId($this->getUser());
            $oferta->setOpis($data["dodatkoweinformacje"]);
            $oferta->setKategoria($data["typstancji"]);
            $oferta->setTyp($data["typbudynku"]);
            $oferta->setLatLong();
            $oferta->setWyslano();
            $oferta->setWygasa($data["czastrwania"]);
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            //sprawdzam preferencje

            $this->checkPreferencje('kobiety',$oferta,$data['kobiety']);
            $this->checkPreferencje('meżczyźni',$oferta,$data['mezczyzni']);
            $this->checkPreferencje('palący',$oferta,$data['palacy']);
            $this->checkPreferencje('pary',$oferta,$data['pary']);
            $this->checkPreferencje('pracujący',$oferta,$data['pracujacy']);
            $this->checkPreferencje('studenci',$oferta,$data['studenci']);

            $this->checkWyposazenie('internet',$oferta,$data['internet']);
            $this->checkWyposazenie('telefon',$oferta,$data['telefon']);
            $this->checkWyposazenie('telewizor',$oferta,$data['telewizor']);
            $this->checkWyposazenie('kablówka',$oferta,$data['kablowka']);
            $this->checkWyposazenie('pralka',$oferta,$data['pralka']);
            $this->checkWyposazenie('lodówka',$oferta,$data['lodowka']);
            $this->checkWyposazenie('prysznic',$oferta,$data['prysznic']);
            $this->checkWyposazenie('wanna',$oferta,$data['wanna']);
            $this->checkWyposazenie('balkon',$oferta,$data['balkon']);
            $this->checkWyposazenie('taras',$oferta,$data['taras']);
            $this->checkWyposazenie('parking',$oferta,$data['parking']);
            $this->checkWyposazenie('garaż',$oferta,$data['garaz']);

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $manager = $this->get('oneup_uploader.orphanage_manager')->get('gallery');
            $finder=$manager->getFiles();

            foreach($finder as $file)
            {
                $Zdjecie = new Zdjecia();
                $Zdjecie->setOferta($oferta);
                $Zdjecie->setImageName($file->getRelativePathname());
                $em = $this->getDoctrine()->getManager();
                $em->persist($Zdjecie);
                $em->flush();
            }
            $manager->uploadFiles(iterator_to_array($finder),$oferta->getIdOferty());


            return $this->redirectToRoute('_oferta',array('idOferty' => $oferta->getIdOferty()));
        }

        return $this->render(':Szablony:editoferty.html.twig', array(
            'form' => $form->createView(),
            'oferta'=>$oferta
        ));
    }

}