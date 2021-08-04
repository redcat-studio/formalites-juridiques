<?php

namespace App\Form;

use App\Entity\CompanyExecutive;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyExecutiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('executive_title')
            ->add('executive_firstname')
            ->add('executive_lastname')
            ->add('executive_birthdate')
            ->add('executive_birth_city')
            ->add('executive_nationality')
            ->add('executive_address')
            ->add('executive_zipcode')
            ->add('executive_city')
            ->add('executive_mother_firstname_and_maiden_name')
            ->add('executive_father_name')
            ->add('executive_email')
            ->add('executive_company_name')
            ->add('executive_company_rcs_number')
            ->add('executive_company_headquarters_address')
            ->add('executive_company_zipcode')
            ->add('executive_company_city')
            ->add('executive_company_rcs')
            ->add('executive_company_representative_name')
            ->add('company_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompanyExecutive::class,
        ]);
    }
}
