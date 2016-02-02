<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoweOgloszenie extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('wolneod', 'date', array(
            'widget' => 'single_text',
            'format' => 'dd-MM-yyyy',
            'max_length' => '15',
            'attr' => array(
                'class' => 'form-control input-inline datepicker',
                'data-provide' => 'datepicker',
                'data-date-format' => 'dd-mm-yyyy',
                'orientation' => 'bottom'
            )
        ))
                ->add('tytul', 'text', array(
                    'max_length' => '30',
                ))

                ->add('miasto', 'text', array(
                    'max_length' => '15',
                ))
                ->add('dzielnica', 'text', array(
                    'max_length' => '30',
                ))
                ->add('ulica', 'text', array(
                    'max_length' => '35',
                ))
                ->add('numer', 'number', array(
                    'max_length' => '4',
                 ))
                ->add('typstancji', 'choice', array(
                    'choices'  => array('Miejsce w pokoju' => 'Miejsce w pokoju', 'Pokój' => 'Pokój', 'Mieszkanie' => 'Mieszkanie', 'Kawalerka' => 'Kawalerka'),
                ))
                ->add('typbudynku', 'choice', array(
                    'choices'  => array( 'Blok' => 'Blok', 'Kamienica' => 'Kamienica', 'Jednorodzinny' => 'Jednorodzinny'),
                ))
                ->add('pietro', 'number', array(
                    'max_length' => '2',
                ))
                ->add('liczbapokoi', 'number', array(
                    'max_length' => '2',
                ))
                ->add('maksliczbaosob', 'number', array(
                    'max_length' => '2',
                ))
                ->add('metraz', 'number', array(
                    'max_length' => '3',
                ))
                ->add('czastrwania', 'choice', array(
                    'choices'  => array( '14' => '14 dni', '30' => '30 dni', '60' => '60 dni'),
                    'required' => false,
                ))


                /*
                 * Wyposazenie
                 */
                ->add('internet', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('telefon', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('telewizor', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('kablowka', 'checkbox', array(
                    'label' => 'TV-kablowa',
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('pralka', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('lodowka', 'checkbox', array(
                    'label' => 'Lodówka',
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('prysznic', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('wanna', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('balkon', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('taras', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('parking', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'

                    ), 'required' => false
                ))
                ->add('garaz', 'checkbox', array(
                    'label' => 'Garaż',
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                /*
                        OPLATY
                 */
                ->add('cenazamiesiac', 'number', array(
                    'max_length' => '4',

                ))
                ->add('dodatkoweoplaty', 'number', array(
                    'max_length' => '4',
                    'required' => false

                ))
                ->add('kaucja', 'number', array(
                    'max_length' => '4',
                    'required' => false
                ))

                /*
                 PREFERENCJE
                 */

                ->add('kobiety', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'

                    ),
                    'required' => false

                ))
                ->add('mezczyzni', 'checkbox', array(
                    'label' => 'Mężczyźni',
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('palacy', 'checkbox', array(
                    'label' => 'Palący',
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('studenci', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('pary', 'checkbox', array(
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('pracujacy', 'checkbox', array(
                    'label' => 'Pracujący',
                    'label_attr' => array(
                        'class' => 'checkbox-inline'
                    ),
                    'required' => false
                ))
                ->add('dodatkoweinformacje', 'textarea', array(
                    'max_length' => '255',
                    'required' => false,
                ))

            ->getForm();


    }

    public function getName()
    {
        return 'app_bundle_nowe_ogloszenie';
    }
}
