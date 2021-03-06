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
            'label' => 'nationalit√©',
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
            'label' => 'Pr√©nom et nom de jeune fille de la m√®re',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_father_name', TextType::class, [
            'label' => 'Pr√©nom et nom du p√®re',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_email', TextType::class, [
            'label' => 'Adresse e-mail du g√©rant',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_company_name', TextType::class, [
            'label' => 'Nom de la soci√©t√©',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])


        ->add('executive_company_rcs_number', TextType::class, [
            'label' => 'Num√©ro RCS',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])


        ->add('executive_company_headquarters_address', TextType::class, [
            'label' => 'Adresse du si√®ge social',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_company_zipcode', TextType::class, [
            'label' => 'Code Postal  si√®ge social',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_company_city', TextType::class, [
            'label' => 'Ville si√®ge social',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_company_rcs', TextType::class, [
            'label' => 'Immatricul√©e au Registre du Commerce et des Soci√©t√©s du',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false,
           'empty_data' => false,
        ])

        ->add('executive_company_representative_name', TextType::class, [
            'label' => 'Repr√©sentant l√©gal de la soci√©t√©',
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
