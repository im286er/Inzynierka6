<?php

namespace AppBundle\Controller;



use AppBundle\Entity\User;
use AppBundle\Form\Komentarze;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class ProfilUzytkownikaController extends Controller
{
    /**
     * @Route("/profil/{id}", name="ProfilUzytkownika")
     */

    public function showAction(User $user)
    {
        $task = new Komentarze();

        $form = $this->createForm(new Komentarze());


        return $this->render(':Szablony:profiluzytkownika.html.twig', array(
            'user' => $user,
            'form' => $form->createView()

        ));
    }

}