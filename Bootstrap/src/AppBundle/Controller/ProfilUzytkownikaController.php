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
        //Jeśli użytkownik otwiera swój własny profil to następuje przekierowanie do odpowiedniego kontrollera
        if($user==$this->getUser())
            return $this->redirectToRoute('fos_user_profile_show');

        $form = $this->createForm(new Komentarz());
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getEntityManager();
        if ($form->isValid()) {

            $data = $form->getData();
            $Komentarz = new Komentarze();
            $Komentarz->setKomentarz($data["komentarz"]);
            $Komentarz->setUserProfil($user);
            $Komentarz->setUserKomentujacy($this->getUser());
            $Komentarz->setWyslano();
            $em->persist($Komentarz);
            $em->flush();
            return $this->redirect($request->getUri());
        }

        //Komentarze

        $result = $em->createQueryBuilder();
        $dql=$result->select('k')
            ->from('AppBundle:Komentarze', 'k')
            ->andWhere('k.user_profil = :user')
            ->setParameter('user', $user)
            ->orderBy('k.wyslano', 'DESC')
            ->getQuery();


        $paginator  = $this->get('knp_paginator');
        $pagi_komentarze = $paginator->paginate(
            $dql, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );


        return $this->render(':Szablony:profiluzytkownika.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
            'komentarze'=>$pagi_komentarze

        ));
    }


}