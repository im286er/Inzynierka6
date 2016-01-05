<?php

namespace AppBundle\Controller;



use AppBundle\Entity\User;
use AppBundle\Entity\Komentarze;
use AppBundle\Form\Komentarz;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class ProfilUzytkownikaController extends Controller
{
    /**
     * @Route("/profil/{id}", name="ProfilUzytkownika")
     */

    public function showAction(User $user,Request $request)
    {
        $task = new Komentarz();

        $form = $this->createForm(new Komentarz());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $data = $form->getData();
            $Komentarz = new Komentarze();
            $Komentarz->setKomentarz($data["komentarz"]);
            $Komentarz->setUserProfil($user);
            $Komentarz->setUserKomentujacy($this->getUser());
            $em->persist($Komentarz);
            $em->flush();

        }


        return $this->render(':Szablony:profiluzytkownika.html.twig', array(
            'user' => $user,
            'form' => $form->createView()

        ));
    }


}