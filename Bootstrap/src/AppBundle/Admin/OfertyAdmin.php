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
            ->add('kategoria', 'text', array('label' => 'kat'))
            ->add('tytul', 'text', array('label' => 'tytul'))
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
        ;
    }
}