<?php

namespace AppBundle\Controller;


use AppBundle\Entity\SearchEntity;
use AppBundle\Entity\Oferty;
use AppBundle\Form\Search;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GlownaController extends Controller
{
    /**
     * @Route("", name="StronaGlowna")
     */
    public function newAction(Request $request)
    {
        $task = new SearchEntity();
        $form = $this->createForm(new Search());

        $em    = $this->get('doctrine.orm.entity_manager');

        $dql   = "SELECT o FROM AppBundle:Oferty o ORDER BY o.views DESC";
        $query = $em->createQuery($dql)->setMaxResults(8);

        //Pobieranie zdjęć
        $oferty = $query->getResult();
        $i=0;
        $zdjecia=null;
        foreach ($oferty as $of)
        {
            $Repository = $this->getDoctrine()
                ->getRepository('AppBundle:Zdjecia');

            $zdjecia[$i]=$Repository->findOneBy(
                array('oferta' =>$of)
            );
            $i=$i+1;
        }

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            8/*limit per page*/

        );
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $data = $form->getData();


            if($data['cenaod']!=null)
                $cenaod=$data['cenaod'];
            else
                $cenaod=0;
            if($data['cenado']!=null)
                $cenado=$data['cenado'];
            else
                $cenado=9999;

            if($data['metrazod']!=null)
                $metrazod=$data['metrazod'];
            else
                $metrazod=0;
            if($data['metrazdo']!=null)
                $metrazdo=$data['metrazdo'];
            else
                $metrazdo=999;


            return $this->redirectToRoute('_search', array(
                'search' =>$data['search'],
                'cenaod'=>$cenaod,
                'cenado'=>$cenado,
                'metrazod'=>$metrazod,
                'metrazdo'=>$metrazdo,
                'kategoria'=>$data['kategoria']

            ));

        }
        return $this->render(':Szablony:glowna.html.twig', array(
            'form' => $form->createView(),
            'pagination' => $pagination,
            'zdjecia' => $zdjecia


        ));
    }


}