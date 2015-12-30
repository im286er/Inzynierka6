<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends AbstractType
{
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imie', 'text', array('max_length' => '15','label' => false, 'translation_domain' => 'FOSUserBundle'))
            ->add('nazwisko', 'text', array('max_length' => '20','label' => false, 'translation_domain' => 'FOSUserBundle'))
            ->add('username', null, array('max_length' => '15','label' => false, 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('max_length' => '35','label' => false, 'translation_domain' => 'FOSUserBundle'))
            ->add('telefon', 'number', array('max_length' => '14','label' => false, 'translation_domain' => 'FOSUserBundle', 'required' => false, 'empty_data'  => ''))
            ->add('plainPassword', 'repeated', array(
                'max_length' => '20',
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => false),
                'second_options' => array('label' => false),
                'invalid_message' => 'Podane hasła nie są takie same',
            ))
            ->add('captcha', 'captcha', array(
                'label' => ' ',
                'width' => 200,
                'height' => 50,
                'length' => 5,
                'invalid_message' => 'Przepisany kod z obrazka jest niepoprawny',
                'background_color' => [255, 255, 255],
                'quality' => 60,
                'max_front_lines' => 0,
                'max_behind_lines' => 0,
            ))
            ->add('regulamin', 'checkbox', array(
                'label' => 'Akceptuje regulamin serwisu:',
                'label_attr' => array(
                    'class' => 'checkbox-inline'
                ),
                'required' => true
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention'  => 'registration',
        ));
    }

    // BC for SF < 2.7
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    public function getName()
    {
        return 'fos_user_registration';
    }
}
