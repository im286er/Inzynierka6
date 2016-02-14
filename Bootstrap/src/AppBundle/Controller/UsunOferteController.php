<?php
namespace AppBundle\Controller;



use AppBundle\Entity\Oferty;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class UsunOferteController extends Controller
{
    /**
     * @Route("/oferta/{idOferty}/delete", name="App_UsunOferte")
     */
    public function deletebyAction($idOferty){
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        else {
            $em = $this->getDoctrine()->getEntityManager();
            $oferta = $em->getRepository('AppBundle:Oferty')->findOneBy(
                array('idOferty' => $idOferty)
            );
            if ($oferta->getUserId() != $user) {
                throw new AccessDeniedException('This user does not have access to this section.');
            } else {
                $em->remove($oferta);
                $em->flush();
            }
        }

        return $this->redirectToRoute('App_MojeWystawioneOgloszenia');

    }
}