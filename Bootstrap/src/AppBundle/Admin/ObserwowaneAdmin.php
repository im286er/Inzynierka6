<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2016-01-19
 * Time: 20:15
 */

namespace AppBundle\Admin;

use AppBundle\Entity\Oferty;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ObserwowaneAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id', 'integer', array('label' => 'id'))
            ->add('id_oferty', 'integer', array('label' => 'idoferty'))
            ->add('user', 'integer', array('label' => 'idUzytkownika'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('oferta')
            ->add('user')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('oferta')
            ->addIdentifier('user')
        ;
    }
}