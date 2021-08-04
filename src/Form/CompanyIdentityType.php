<?php

namespace App\Form;

use App\Entity\CompanyIdentity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CompanyIdentityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])

            ->add('head_office_address', TextType::class, [
                'label' => 'Adress',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])

            ->add('zipcode', TextType::class, [
                'label' => 'Code Postal',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])

            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])

            ->add('rcs_city', TextType::class, [
                'label' => 'La société sera inscrite au RCS de
                ',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            
            ->add('phone', TextType::class, [
                'label' => 'Tél : ',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])

            ->add('type', TextType::class, [
                'label' => 'Type',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-Mail',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompanyIdentity::class,
        ]);
    }
}
