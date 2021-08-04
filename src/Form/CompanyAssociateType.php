<?php

namespace App\Form;

use App\Entity\CompanyAssociate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyAssociateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('associate_type')
            ->add('individual_genre')
            ->add('individual_firstname')
            ->add('individual_lastname')
            ->add('individual_birthdate')
            ->add('individual_birth_city')
            ->add('individual_nationality')
            ->add('individual_address')
            ->add('individual_zipcode')
            ->add('individual_city')
            ->add('individual_is_married_under_community_of_property')
            ->add('individual_did_contributed_cash')
            ->add('individual_did_contributed_in_kind')
            ->add('legal_company_name')
            ->add('legal_company_rcs_number')
            ->add('legal_company_headquarters_address')
            ->add('legal_company_zipcode')
            ->add('legal_company_city')
            ->add('legal_company_city_of_registry')
            ->add('legal_company_social_capital')
            ->add('legal_company_social_form')
            ->add('legal_representative_firstname')
            ->add('legal_representative_lastname')
            ->add('legal_representative_genre')
            ->add('legal_representative_role')
            ->add('subject_to_what_income_tax')
            ->add('subject_to_what_real_tax')
            ->add('vat_system')
            ->add('compony_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompanyAssociate::class,
        ]);
    }
}
