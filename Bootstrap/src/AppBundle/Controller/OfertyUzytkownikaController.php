<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2015-12-18
 * Time: 19:34
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class OfertyUzytkownikaController extends Controller
{

    /**
     * @Route("/profil/{id}/oferty", name="OfertyUzytkownika")
     */

    public function listAction(User $user,Request $request){
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM AppBundle:Oferty a WHERE a.user_id=".$user->getID();
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );

        // parameters to template
        return $this->render(':Szablony:wystawioneogloszeniauzytkownika.html.twig', array(
            'pagination' => $pagination,
            'user' => $user
        ));
    }


    public function showAction(User $user)
    {
        $user=$this->getUser();
        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Oferty');


        $oferty=$Repository->findBy(
            array('user_id' =>$user->getId())
        );



        return $this->render(':Szablony:wystawioneogloszeniauzytkownika.html.twig', array(
            'oferty' => $oferty,
            'user' => $user

        ));
    }

}