<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2016-01-11
 * Time: 18:49
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Obserwowane;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


class ObserwowaneController extends Controller
{
    /**
     * @Route("/profile/obserwowane", name="ObserwowaneOgloszenia")
     */
    public function listAction(Request $request){

        $em    = $this->get('doctrine.orm.entity_manager');
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $em = $this->getDoctrine()->getManager();
        $result = $em->createQueryBuilder();
        $dql=$result->select('o')
            ->from('AppBundle:Oferty', 'o')
            ->innerJoin('o.obserwowane','w')
            ->andWhere('w.user = :user')
            ->setParameter('user', $this->getUser()->getID())
            ->getQuery();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $dql, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render(':Szablony/profil:obserwowane.html.twig', array(
            'user' => $user,
            'pagination' => $pagination,
        ));
    }
}