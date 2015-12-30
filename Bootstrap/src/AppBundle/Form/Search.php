<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Search extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search', 'text', array(
            'label' => ' '
            ))
            ->add('kategoria', 'choice', array(
                'choices'  => array('mp' => 'Miejsce w pokoju', 'p' => 'Pokój',  'm' => 'Mieszkanie', 'k' => 'Kawalerka'  ),
                'required' => false,
                'label' => 'Kategoria: ',
            ))
            ->add('cenaod', 'number', array(
                'label' => false,
                'required' => false,
            ))
            ->add('cenado', 'number', array(
                'label' => false,
                'required' => false
            ))
            ->add('metraz', 'number', array(
                'label' => false,
                'required' => false,
            ));
    }


    public function getName()
    {
        return 'app_bundle_search';
    }
}
