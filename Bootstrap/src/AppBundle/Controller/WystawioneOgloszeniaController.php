<?php
namespace AppBundle\Controller;



use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use AppBundle\Entity\Obserwowane;

use FOS\UserBundle\Model\UserInterface;


class WystawioneOgloszeniaController extends Controller
{
    /**
     * @Route("/profile/oferty", name="App_MojeWystawioneOgloszenia")
     */

    public function listAction(Request $request){
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em    = $this->get('doctrine.orm.entity_manager');

        $dql   = "SELECT a FROM AppBundle:Oferty a WHERE a.user_id=".$this->getUser()->getID();
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        // parameters to template
        return $this->render(':Szablony/profil:wystawioneogloszenia.html.twig', array(
                'pagination' => $pagination,

        ));
    }




}