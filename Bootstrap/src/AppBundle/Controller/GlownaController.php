<?php

namespace AppBundle\Controller;


use AppBundle\Entity\SearchEntity;
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
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/

        );

        return $this->render(':Szablony:glowna.html.twig', array(
            'form' => $form->createView(),
            'pagination' => $pagination,


        ));
    }

}