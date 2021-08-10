<?php

namespace App\Form;

use App\Entity\CompanyStatus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyStatusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('head_office_type')
            ->add('domiciliation_company_name')
            ->add('domiciliation_company_siren')
            ->add('company_purpose')
            ->add('social_capital_type')
            ->add('social_capital_amount')
            ->add('social_capital_min')
            ->add('social_capital_max')
            ->add('capital_release_rate')
            ->add('capital_released_amount')
            ->add('capital_deposit_date')
            ->add('capital_deposit_type')
            ->add('deposit_bank_name')
            ->add('deposit_bank_address')
            ->add('deposit_bank_zipcode')
            ->add('deposit_bank_city')
            ->add('notary_study_name')
            ->add('notary_study_address')
            ->add('notary_study_zipcode')
            ->add('notary_study_city')
            ->add('normal_company_exercice_closure_date')
            ->add('first_company_exercice_closure_data')
            ->add('business_acronym')
            ->add('business_commercial_name')
            ->add('business_domain_name')
            ->add('business_sign')
            ->add('company_id')
            ->add('subject_to_what_income_tax', TextType::class, [
                'label' => 'La société est assujettie à L\'impôt sur :',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])

            ->add('subject_to_what_real_tax', TextType::class, [
                'label' => 'La société est assujettie à L\'impôt',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
     'empty_data' => false,
            ])

            ->add('vat_system', TextType::class, [
                'label' => 'Régime de TVA',
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
            'data_class' => CompanyStatus::class,
        ]);
    }
}
