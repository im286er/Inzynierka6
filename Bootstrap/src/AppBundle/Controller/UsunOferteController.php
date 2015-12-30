<?php
namespace AppBundle\Controller;



use AppBundle\Entity\Oferty;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UsunOferteController extends Controller
{
    /**
     * @Route("/profile/oferty/delete", name="UsunOferte")
     */


    public function deletebyAction($idOferty,Oferty $oferty){

        $em = $this->getDoctrine()->getEntityManager();
        $oferta = $em->getRepository('AppBundle:Oferty')->findBy($idOferty);

        $em = $this->getDoctrine()->getEntityManager();
        $adminentities = $em->getRepository('BlogBundle:posted')->find($idOferty);

        $em->remove($adminentities);
        $em->flush();

        return $this->render(":Szablony:wystawioneogloszenia.html.twig", array(
            'oferta' => $oferta
        ));

    }
}