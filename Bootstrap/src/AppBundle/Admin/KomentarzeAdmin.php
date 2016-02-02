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

class KomentarzeAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id', 'integer', array('label' => 'id'))
            ->add('komentarz', 'text', array('label' => 'Komentarz'))
            ->add('wyslano', 'date', array('label' => 'Dodano'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('user_komentujacy')
            ->add('user_profil')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('user_komentujacy')
            ->addIdentifier('user_profil')
        ;
    }
}