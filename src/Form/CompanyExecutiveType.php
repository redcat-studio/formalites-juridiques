<?php

namespace App\Form;

use App\Entity\CompanyExecutive;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CompanyExecutiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('executive_title', TextType::class, [
            'label' => 'title',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
 'empty_data' => false,
        ])

        ->add('executive_firstname', TextType::class, [
            'label' => 'Nom',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
 'empty_data' => false,
        ])

        ->add('executive_lastname', TextType::class, [
            'label' => 'Prenom',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
 'empty_data' => false,
        ])

        ->add('executive_birthdate', DateType::class, [
            'label' => 'Date de naissance',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
 'empty_data' => false,
        ])

        ->add('executive_birth_city', TextType::class, [
            'label' => 'Ville de naissance',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
         'empty_data' => false,
        ])

        ->add('executive_nationality', TextType::class, [
            'label' => 'nationalité',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
            'empty_data' => false,
        ])


        ->add('executive_address', TextType::class, [
            'label' => 'adresse',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
 'empty_data' => false,
        ])

        ->add('executive_zipcode', TextType::class, [
            'label' => 'code postal',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_city', TextType::class, [
            'label' => 'Ville',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_mother_firstname_and_maiden_name', TextType::class, [
            'label' => 'Prénom et nom de jeune fille de la mère',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_father_name', TextType::class, [
            'label' => 'Prénom et nom du père',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_email', TextType::class, [
            'label' => 'Adresse e-mail du gérant',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_company_name', TextType::class, [
            'label' => 'Nom de la société',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])


        ->add('executive_company_rcs_number', TextType::class, [
            'label' => 'Numéro RCS',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])


        ->add('executive_company_headquarters_address', TextType::class, [
            'label' => 'Adresse du siège social',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_company_zipcode', TextType::class, [
            'label' => 'Code Postal  siège social',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_company_city', TextType::class, [
            'label' => 'Ville siège social',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_company_rcs', TextType::class, [
            'label' => 'Immatriculée au Registre du Commerce et des Sociétés du',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_company_representative_name', TextType::class, [
            'label' => 'Représentant légal de la société',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

           

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompanyExecutive::class,
        ]);
    }
}
