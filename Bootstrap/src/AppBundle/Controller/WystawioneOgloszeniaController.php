<?php
namespace AppBundle\Controller;



use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class WystawioneOgloszeniaController extends Controller
{
    /**
     * @Route("/profile/oferty", name="App_MojeWystawioneOgloszenia")
     */

    public function listAction(Request $request){
        $em    = $this->get('doctrine.orm.entity_manager');

        $dql   = "SELECT a FROM AppBundle:Oferty a WHERE a.user_id=".$this->getUser()->getID();
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );

        // parameters to template
        return $this->render(':Szablony/profil:wystawioneogloszenia.html.twig', array(
                'pagination' => $pagination,

        ));
    }




}