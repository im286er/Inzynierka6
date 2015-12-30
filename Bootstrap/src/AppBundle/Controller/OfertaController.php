<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Oferty;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OfertaController extends Controller
{
    /**
     * @Route("/oferta/{idOferty}", name="Oferta")
     */

    public function showAction($idOferty,Oferty $oferty)
    {

        //WYPOSAZENIE
        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Wyposazenie_Oferty');

        $Oferta = (string)$idOferty;

        $wyposazenie_oferty=$Repository->findBy(
            array('oferta' =>$Oferta)
             );

        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Wyposazenie');

        $i=0;
        $wyp=null;
        foreach($wyposazenie_oferty as $wyposazenie)
        {
            $wyp[$i] = $Repository->find(
                $wyposazenie->getWyposazenie()
            )->getNazwawyposazenia();
            $i=$i+1;
        }


        //Preferencje

        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Preferencje_Oferty');

        $preferencje_oferty=$Repository->findBy(
            array('oferta' =>$Oferta)
        );


        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Preferencje');

        $i=0;
        $pref=null;
        foreach($preferencje_oferty as $preferencje)
        {
            $pref[$i] = $Repository->find(
                $preferencje->getPreferencja()
            )->getTypPreferencji();
            $i=$i+1;
        }


        //WYPOSAZENIE
        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Zdjecia');



        $zdjecia=$Repository->findBy(
            array('oferta' =>$Oferta)
        );

        $em = $this->getDoctrine()->getManager();
        $views = $oferty->getViews();
        $oferty->setViews($views + 1);
        $em->flush();



        return $this->render(':Szablony:oferta.html.twig', array(
            'oferty'        => $oferty,
            'wyposazenie_oferty'        => $wyposazenie_oferty,
            'wyposazenie'=> $wyp,
            'preferencje'=> $pref,
            'zdjecia'=> $zdjecia,

        ));
    }

}