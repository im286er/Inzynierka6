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
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ObserwujController extends Controller
{
    /**
     * @Route("/oferta/{idOferty}/obserwuj", name="App_Obserwuj")
     */
    public function obserwujAction($idOferty){
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        //Dodac ifa na czy zalogowany i czy juz obserwuje
        $em = $this->getDoctrine()->getEntityManager();
        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Oferty');
        $ObserwowanaOferta = new Obserwowane();
        $ObserwowanaOferta->setUser($user);
        $ObserwowanaOferta->setOferta($Repository->findOneBy(
            array('idOferty' =>$idOferty)
        ));
        $em->persist($ObserwowanaOferta);
        $em->flush();

        return $this->redirectToRoute('_oferta',array('idOferty' => $idOferty));

    }
}