<?php
namespace AppBundle\Controller;



use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\Search;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{


    public function listAction(Request $request, $search, $cenaod,$cenado,$metrazod,$metrazdo,$kategoria){

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new Search());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            if ($data['cenaod'] != null)
                $cenaod = $data['cenaod'];
            else
                $cenaod = 0;
            if ($data['cenado'] != null)
                $cenado = $data['cenado'];
            else
                $cenado = 9999;

            if ($data['metrazod'] != null)
                $metrazod = $data['metrazod'];
            else
                $metrazod = 0;
            if ($data['metrazdo'] != null)
                $metrazdo = $data['metrazdo'];
            else
                $metrazdo = 999;
            return $this->redirectToRoute('_search', array(
                'search' =>$data['search'],
                'cenaod'=>$cenaod,
                'cenado'=>$cenado,
                'metrazod'=>$metrazod,
                'metrazdo'=>$metrazdo,
                'kategoria'=>$data['kategoria']
            ));
        }


            //Budowanie Zapytania
        $result = $em->createQueryBuilder();
        $dql=$result->select('o')
                ->from('AppBundle:Oferty', 'o');

        //Słowa kluczowe
        $phrase= explode(" ",$search);
        foreach($phrase as $i=>$word)
        {
            $dql->orWhere($result->expr()->andX(
                $result->expr()->orX(
                    $result->expr()->like('o.tytul', ':param'.$i),
                    $result->expr()->like('o.miasto', ':param'.$i),
                    $result->expr()->like('o.dzielnica', ':param'.$i),
                    $result->expr()->like('o.ulica', ':param'.$i),
                    $result->expr()->like('o.opis', ':param'.$i))
               ))
                ->setParameter(':param'.$i, '%'.$word.'%');
        }
        //Cena
        $dql->andWhere($result->expr()->andX(
                $result->expr()->gte('o.cena', ':cenaod'),
                $result->expr()->lte('o.cena', ':cenado')
            ))
            ->setParameter(':cenaod',$cenaod)
            ->setParameter(':cenado', $cenado);
        //Metraż
        $dql->andWhere($result->expr()->andX(
            $result->expr()->gte('o.metraz', ':metrazod'),
            $result->expr()->lte('o.metraz', ':metrazdo')
        ))
            ->setParameter(':metrazod',$metrazod)
            ->setParameter(':metrazdo', $metrazdo);
        //Kategoria
        if($kategoria!='all')
        {
            $dql->andWhere($result->expr()->eq('o.kategoria', ':kategoria'))
                ->setParameter(':kategoria', $kategoria);
        }


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $dql->getQuery(), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            20/*limit per page*/
        );

        //Pobieranie zdjęć//Pobieranie zdjęć
        $dql2   = "SELECT o FROM AppBundle:Oferty o ORDER BY o.views DESC";
        $query = $em->createQuery($dql2);
        $oferty = $query->getResult();
        $i=0;
        $zdjecia=null;
        foreach ($oferty as $of)
        {
            $Repository = $this->getDoctrine()
                ->getRepository('AppBundle:Zdjecia');

            $zdjecia[$i]=$Repository->findOneBy(
                array('oferta' =>$of)
            );
            $i=$i+1;
        }

        //WYPOSAZENIE
        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Wyposazenie_Oferty');

        $wyposazenie_oferty=$Repository->findBy(
            array('oferta' =>$of)
        );

        $Repository = $this->getDoctrine()
            ->getRepository('AppBundle:Wyposazenie');

        $i=0;
        $wyp=null;
        foreach($wyposazenie_oferty as $wyposazenie)
        {
            $wyp[$i] = $Repository->find(
                $wyposazenie->getWyposazenie()
            )->getNazwawyposazenia();
            $i=$i+1;
        }



        return $this->render(':Szablony:search.html.twig', array(
            'form' => $form->createView(),
            'pagination' => $pagination,
            'zdjecia' => $zdjecia,
            'oferty'        => $oferty,
            'wyposazenie_oferty'        => $wyposazenie_oferty,
            'wyposazenie'=> $wyp,
        ));

    }




}