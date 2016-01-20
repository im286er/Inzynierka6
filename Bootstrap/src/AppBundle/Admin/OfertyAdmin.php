<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2016-01-19
 * Time: 20:18
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class OfertyAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('idOferty', 'integer', array('label' => 'id'))
            ->add('kategoria', 'text', array('label' => 'Kategoria'))
            ->add('typ', 'text', array('label' => 'Typ'))
            ->add('wolneod', 'date', array('label' => 'Wolne od'))
            ->add('tytul', 'text', array('label' => 'tytul'))
            ->add('miasto', 'text', array('label' => 'Miasto'))
            ->add('dzielnica', 'text', array('label' => 'Dzielnica'))
            ->add('ulica', 'text', array('label' => 'Ulica'))
            ->add('pietro', 'integer', array('label' => 'Pietro'))
            ->add('liczbapokoi', 'integer', array('label' => 'Liczba pokoi'))
            ->add('maksliczbosob', 'integer', array('label' => 'Maksymalna liczba osob'))
            ->add('metraz', 'integer', array('label' => 'Metraz'))
            ->add('cena', 'integer', array('label' => 'Cena'))
            ->add('dodatkoweoplaty', 'integer', array('label' => 'Dodatkowe oplaty'))
            ->add('kaucja', 'integer', array('label' => 'Kaucja'))
            ->add('opis', 'text', array('label' => 'Opis'))
            ->add('wyslano', 'datetime', array('label' => 'Wyslano'))
            ->add('preferencja')
            ->add('wyposazenie')
            ->add('zdjecia')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idOferty')
            ->add('kategoria')
            ->add('tytul')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id_oferty')
            ->addIdentifier('kategoria')
            ->addIdentifier('wyslano')
        ;
    }
}