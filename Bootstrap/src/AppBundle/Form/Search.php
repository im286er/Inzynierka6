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
            'label' => false
            ))
            ->add('kategoria', 'choice', array(
                'choices'  => array('w'=>'Wszystkie','mp' => 'Miejsce w pokoju', 'p' => 'Pokój',  'm' => 'Mieszkanie', 'k' => 'Kawalerka'  ),
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
            ->add('metrazod', 'number', array(
                'label' => false,
                'required' => false,
            ))
            ->add('metrazdo', 'number', array(
                'label' => false,
                'required' => false,
            ));
    }


    public function getName()
    {
        return 'app_bundle_search';
    }
}
