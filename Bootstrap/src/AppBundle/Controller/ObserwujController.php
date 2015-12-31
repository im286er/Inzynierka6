<?php
/**
 * Created by PhpStorm.
 * User: Lenin
 * Date: 2015-12-31
 * Time: 18:01
 */
namespace AppBundle\Controller;
use AppBundle\Entity\Obserwowane;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ObserwujController extends Controller
{
    /**
     * @Route("/oferta/{idOferty}/obserwuj", name="App_Obserwuj")
     */
    public function obserwujAction($idOferty){

        //Dodac ifa na czy zalogowany i czy juz obserwuje
        $em = $this->getDoctrine()->getEntityManager();
        $ObserwowanaOferta = new Obserwowane();
        $ObserwowanaOferta->setUser($this->getUser()->getId());
        $ObserwowanaOferta->setOferta($idOferty);
        $em->persist($ObserwowanaOferta);
        $em->flush();

        return $this->redirectToRoute('_oferta',array('idOferty' => $idOferty));

    }
}