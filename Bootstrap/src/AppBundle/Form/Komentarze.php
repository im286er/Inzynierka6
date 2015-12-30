<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Komentarze extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->
            add('komentarz', 'textarea', array(
                'max_length' => '255',
                'required' => false,
                'label'=> false
            ))

            ->getForm();
    }


    public function getName()
    {
        return 'app_bundle_komentarze';
    }
}
