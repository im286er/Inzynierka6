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
     * @Route("/oferta/{idOferty}/delete", name="App_UsunOferte")
     */
    public function deletebyAction($idOferty){

        $em = $this->getDoctrine()->getEntityManager();
        $oferta = $em->getRepository('AppBundle:Oferty')->findOneBy(
            array('idOferty' => $idOferty)
        );

        $em->remove($oferta);
        $em->flush();

        return $this->redirectToRoute('App_MojeWystawioneOgloszenia');

    }
}