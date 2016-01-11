<?php
namespace AppBundle\Controller;



use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    /**
     * @Route("/search", name="App_Search")
     */

    public function listAction(Request $request, $search, $cenaod,$cenado){

        $em = $this->getDoctrine()->getManager();
        $result = $em->createQueryBuilder();
        $phrase= explode(" ",$search);

            $dql=$result->select('o')
                ->from('AppBundle:Oferty', 'o');

        foreach($phrase as $word)
        {
            $dql->orWhere($result->expr()->andX(
                $result->expr()->orX(
                    $result->expr()->like('o.tytul', ':'.$word),
                    $result->expr()->like('o.miasto', ':'.$word),
                    $result->expr()->like('o.dzielnica', ':'.$word),
                    $result->expr()->like('o.ulica', ':'.$word),
                    $result->expr()->like('o.opis', ':'.$word)),
                $result->expr()->andX(
                    $result->expr()->gt('o.cena', ':cenaod'),
                    $result->expr()->lt('o.cena', ':cenado')
                )))
                ->setParameter(':'.$word, '%'.$word.'%');

        }
        $dql->setParameter(':cenaod',$cenaod)
            ->setParameter(':cenado', $cenado)
            ->getQuery();

                /*->where($result->expr()->andX(
                    $result->expr()->orX(
                        $result->expr()->like('o.tytul', ':search'),
                        $result->expr()->like('o.miasto', ':search'),
                        $result->expr()->like('o.dzielnica', ':search'),
                        $result->expr()->like('o.ulica', ':search')),
                    $result->expr()->andX(
                        $result->expr()->gt('o.cena', ':cenaod'),
                        $result->expr()->lt('o.cena', ':cenado')
                    )))
                ->setParameter(':search', '%'.$search.'%')
                ->setParameter(':cenaod',$cenaod)
                ->setParameter(':cenado', $cenado)
                ->getQuery();*/


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $dql, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render(':Szablony:search.html.twig', array(
            'pagination' => $pagination,
        ));

    }




}