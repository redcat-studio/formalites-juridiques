<?php

namespace App\Form;

use App\Entity\CompanyAssociate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
class CompanyAssociateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('associate_type', TextType::class, [
                'label' => 'type associ',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])
            ->add('individual_genre', TextType::class, [
                'label' => 'Genre',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])
            ->add('individual_firstname', TextType::class, [
                'label' => 'nom',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])
            ->add('individual_lastname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])
             ->add('individual_birthdate', DateType::class, [
                'label' => 'Date de naissance',
                'attr' => [
                    'class' => 'Date de naissance'
                ],
            ])
            ->add('individual_birth_city', TextType::class, [
                'label' => 'Ville de naissance',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])  
           
            ->add('individual_nationality', TextType::class, [
                'label' => 'Nationalité',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])
            ->add('individual_address', TextType::class, [
                'label' => 'Adress',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])

            ->add('individual_zipcode', TextType::class, [
                'label' => 'Code postal',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])
            ->add('individual_city', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])
            ->add('individual_is_married_under_community_of_property', ChoiceType::class, [
                'label' => 'Est ce que l\'Associe est marie sous la communauté des biens',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
                'choices' => [
                    'YES' => 'yes',
                    'NO' => 'no'
                ]
            ])
            ->add('individual_did_contributed_cash', ChoiceType::class, [
                'label' => 'Cet Associe a effectue un apport en numéraire',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
                'choices' => [
                    'YES' => 'yes',
                    'NO' => 'no'
                ]
            ])
            ->add('individual_did_contributed_in_kind', TextType::class, [
                'label' => 'Cet associé a effectué un apport en nature',
                'attr' => [
                    'class' => 'form-control'
                ],
    
                'required' => false,
     'empty_data' => false,
            ])

            ->add('legal_company_name', TextType::class, [
                'label' => 'Nom de la sociétélle',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])

            ->add('legal_company_rcs_number', TextType::class, [
                'label' => 'Numéro RCS',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])

            ->add('legal_company_headquarters_address', TextType::class, [
                'label' => 'Adresse du siège social',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])

            ->add('legal_company_zipcode', TextType::class, [
                'label' => 'Code Postal ',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])

            ->add('legal_company_city', TextType::class, [
                'label' => 'Ville du societe',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])



            ->add('legal_company_city_of_registry', TextType::class, [
                'label' => 'Ville du Greffe',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])
            ->add('legal_company_social_capital', TextType::class, [
                'label' => 'Capital social',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])
            ->add('legal_company_social_form', TextType::class, [
                'label' => 'Forme social',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])
            ->add('legal_representative_firstname', TextType::class, [
                'label' => 'Prenom Représentant',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])

            ->add('legal_representative_lastname', TextType::class, [
                'label' => 'nom Représentant',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])

            ->add('legal_representative_genre', TextType::class, [
                'label' => 'genre Représentant',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])

            ->add('legal_representative_role', TextType::class, [
                'label' => 'role Représentant',
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
            'data_class' => CompanyAssociate::class,
        ]);
    }
}
