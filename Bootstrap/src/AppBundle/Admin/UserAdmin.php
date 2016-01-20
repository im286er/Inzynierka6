<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2016-01-18
 * Time: 20:56
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id', 'integer', array('label' => 'id'))
            ->add('username', 'text', array('label' => 'Username'))
            ->add('username_canonical', 'text', array('label' => 'Username_canon'))
            ->add('email', 'text', array('label' => 'e-mail'))
            ->add('email_canonical', 'text', array('label' => 'e-mail_canon'))
            ->add('imie', 'text', array('label' => 'Imie'))
            ->add('Nazwisko', 'text', array('label' => 'Nazwisko'))
            ->add('Telefon', 'integer', array('label' => 'Telefon'))
            ->add('password', 'text', array('label' => 'Password'))
            ->add('salt', 'text', array('label' => 'Salt'))
            ->add('last_login', 'datetime', array('label' => 'Last login'))
            ->add('enabled', 'checkbox', array('label' => 'Enabled', 'required' => false))
            ->add('locked', 'checkbox', array('label' => 'Locked', 'required' => false))
            ->add('expired', 'checkbox', array('label' => 'Expired', 'required' => false))
            ->add('confirmation_token', 'text', array('label' => 'Confirmation Token', 'required' => false))
            ->add('roles', 'collection', array('label' => 'Roles'))
            ->add('obserwowane')
            ->add('komentarze')

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('email')
            ->add('imie')
            ->add('nazwisko')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->addIdentifier('email')
            ->addIdentifier('imie')
            ->addIdentifier('nazwisko')
        ;
    }
}