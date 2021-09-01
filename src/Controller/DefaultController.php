<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\CompanyIdentity;
use App\Form\CompanyIdentityType;
use App\Repository\CompanyIdentityRepository;
use App\Repository\CompanyStatusRepository;
use App\Entity\CompanyStatus;
use App\Entity\CompanyAssociate;
use Datetime;
use App\Entity\CompanyExecutive;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @Route("/{route}", name="vue_pages", requirements={"route"="^(?!.*api|login|register|logout|checkout|payment).+"})
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {

        $words = ['sky', 'cloud', 'wood', 'rock', 'forest',
            'mountain', 'breeze', 'rouget sall'];


        return $this->render('home/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'controller_name' => 'DefaultController',
            'words' => $words
        ]);
    }

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/payment")
     */
    public function payment()
    {
        $companyIdentity = new CompanyIdentity();
        $companyIdentity = $this->session->get('company');
        return $this->render('payment/index.html.twig', [
            "company" => $companyIdentity->getName()
        ]);
    }

    /**
     * @Route("/api/colors", name="colors_route")
     */
    public function colorsAction()
    {
        return new JsonResponse(array('colors' => ['red', 'green', 'blue', 'yellow'], "success" => true));
    }


    /**
     * @Route("/api/company/add", methods={"POST"})
     */
    public function addToBasket(Request $request, SessionInterface $session): JsonResponse
    {
        $company = $session->get('company', []);
        $form = (json_decode($request->getContent(), true));
        $entityManager = $this->getDoctrine()->getManager();
        //Entreprise
        $companyIdentity = new CompanyIdentity();
        $companyIdentity->setName($form['identity']['name']);
        $companyIdentity->setPhone($form['identity']['phone']);
        $companyIdentity->setType($form['identity']['type']);
        $companyIdentity->setZipcode($form['identity']['zipcode']);
        $companyIdentity->setEmail($form['identity']['email']);
        $companyIdentity->setCity($form['identity']['city']);
        $companyIdentity->setRcsCity($form['identity']['rcs_city']);
        $companyIdentity->setHeadOfficeAddress($form['identity']['head_office_address']);
        $session->set('company', $companyIdentity);
        //Élements Statutaires
        $companyStatus = new CompanyStatus();
        $companyStatus->setCompanyId($companyIdentity);
        $companyStatus->setHeadOfficeType($form['status']['head_office_type']);
        $companyStatus->setDomiciliationCompanyName($form['status']['domiciliation_company_name']);
        $companyStatus->setDomiciliationCompanySiren($form['status']['domiciliation_company_siren']);
        $companyStatus->setCompanyPurpose($form['status']['company_purpose']);
        $companyStatus->setSocialCapitalType($form['status']['social_capital_type']);
        $companyStatus->setSocialCapitalAmount($form['status']['social_capital_amount']);

        $companyStatus->setSocialCapitalMin(intval($form['status']['social_capital_min']));
        $companyStatus->setSocialCapitalMax($form['status']['social_capital_max']);
        $companyStatus->setCapitalReleaseRate($form['status']['capital_release_rate']);
        $companyStatus->setCapitalReleasedAmount($form['status']['capital_released_amount']);
        $companyStatus->setCapitalDepositDate(new Datetime());
        $companyStatus->setCapitalDepositType($form['status']['capital_deposit_type']);
        $companyStatus->setDepositBankName($form['status']['deposit_bank_name']);
        $companyStatus->setDepositBankAddress($form['status']['deposit_bank_address']);
        $companyStatus->setDepositBankCity($form['status']['deposit_bank_city']);
        $companyStatus->setDepositBankZipcode($form['status']['deposit_bank_zipcode']);
        $companyStatus->setNotaryStudyName($form['status']['notary_study_name']);
        $companyStatus->setNotaryStudyAddress($form['status']['notary_study_address']);
        $companyStatus->setNotaryStudyZipcode($form['status']['notary_study_zipcode']);
        $companyStatus->setNotaryStudyCity($form['status']['notary_study_city']);
        $companyStatus->setNormalCompanyExerciceClosureDate($form['status']['normal_company_exercice_closure_date']);
        $companyStatus->setFirstCompanyExerciceClosureData($form['status']['first_company_exercice_closure_data']);
        $companyStatus->setBusinessAcronym($form['status']['business_acronym']);
        $companyStatus->setBusinessCommercialName($form['status']['business_commercial_name']);
        $companyStatus->setBusinessDomainName($form['status']['business_domain_name']);
        $companyStatus->setBusinessSign($form['status']['business_sign']);
        $companyStatus->setSubjectToWhatIncomeTax($form['status']['subject_to_what_income_tax']);
        $companyStatus->setSubjectToWhatRealTax($form['status']['subject_to_what_real_tax']);
        $companyStatus->setVatSystem($form['status']['vat_system']);

        //Associer 
        for ($i = 0; $i < count($form['associates']); $i++) {
            $companyAssociate = new CompanyAssociate();
            $companyAssociate->setComponyId($companyIdentity);
            $companyAssociate->setAssociateType($form['associates'][$i]['associate_type']);
            $companyAssociate->setIndividualGenre($form['associates'][$i]['individual_genre']);
            $companyAssociate->setIndividualFirstname($form['associates'][$i]['individual_firstname']);
            $companyAssociate->setIndividualLastname($form['associates'][$i]['individual_lastname']);
            $companyAssociate->setIndividualBirthdate(new Datetime());
            $companyAssociate->setIndividualBirthCity($form['associates'][$i]['individual_birth_city']);
            $companyAssociate->setIndividualNationality($form['associates'][$i]['individual_nationality']);
            $companyAssociate->setIndividualAddress($form['associates'][$i]['individual_address']);
            $companyAssociate->setIndividualZipcode($form['associates'][$i]['individual_zipcode']);
            $companyAssociate->setIndividualCity($form['associates'][$i]['individual_city']);
            $companyAssociate->setIndividualIsMarriedUnderCommunityOfProperty($form['associates'][$i]['individual_is_married_under_community_of_property']);
            $companyAssociate->setAssociateCashContribution($form['associates'][$i]['associate_cash_contribution']);
            $companyAssociate->setAssociateContributionInKind($form['associates'][$i]['kindContributions']);
            $companyAssociate->setLegalCompanyName($form['associates'][$i]['legal_company_name']);
            $companyAssociate->setLegalCompanyRcsNumber($form['associates'][$i]['legal_company_rcs_number']);
            $companyAssociate->setLegalCompanyHeadquartersAddress($form['associates'][$i]['legal_company_headquarters_address']);
            $companyAssociate->setLegalCompanyZipcode($form['associates'][$i]['legal_company_zipcode']);
            $companyAssociate->setLegalCompanyCity($form['associates'][$i]['legal_company_city']);
            $companyAssociate->setLegalCompanyCityOfRegistry($form['associates'][$i]['legal_company_city_of_registry']);
            $companyAssociate->setLegalCompanySocialCapital($form['associates'][$i]['legal_company_social_capital']);
            $companyAssociate->setLegalCompanySocialForm($form['associates'][$i]['legal_company_social_form']);
            $companyAssociate->setLegalRepresentativeFirstname($form['associates'][$i]['legal_representative_firstname']);
            $companyAssociate->setLegalRepresentativeLastname($form['associates'][$i]['legal_representative_lastname']);
            $companyAssociate->setLegalRepresentativeGenre($form['associates'][$i]['legal_representative_genre']);
            $companyAssociate->setLegalRepresentativeRole($form['associates'][$i]['legal_representative_role']);
            $entityManager->persist($companyAssociate);
        }


        //dirigeant
        for ($i = 0; $i < count($form['executives']); $i++) {
            $companyExecutive = new CompanyExecutive();
            $companyExecutive->setCompanyId($companyIdentity);
            $companyExecutive->setExecutiveTitle($form['executives'][$i]['executive_title']);
            $companyExecutive->setExecutiveFirstname($form['executives'][$i]['executive_firstname']);
            $companyExecutive->setExecutiveLastname($form['executives'][$i]['executive_lastname']);
            $companyExecutive->setExecutiveBirthdate(new Datetime()); //$form['executives']['executive_birthdate']
            $companyExecutive->setExecutiveBirthCity($form['executives'][$i]['executive_birth_city']);
            $companyExecutive->setExecutiveNationality($form['executives'][$i]['executive_nationality']);
            $companyExecutive->setExecutiveAddress($form['executives'][$i]['executive_address']);
            $companyExecutive->setExecutiveZipcode($form['executives'][$i]['executive_zipcode']);
            $companyExecutive->setExecutiveCity($form['executives'][$i]['executive_city']);
            $companyExecutive->setExecutiveMotherFirstnameAndMaidenName($form['executives'][$i]['executive_mother_firstname_and_maiden_name']);
            $companyExecutive->setExecutiveFatherName($form['executives'][$i]['executive_father_name']);
            $companyExecutive->setExecutiveEmail($form['executives'][$i]['executive_email']);
            $companyExecutive->setExecutiveCompanyName($form['executives'][$i]['executive_company_name']);
            $companyExecutive->setExecutiveCompanyRcsNumber($form['executives'][$i]['executive_company_rcs_number']);
            $companyExecutive->setExecutiveCompanyHeadquartersAddress($form['executives'][$i]['executive_company_headquarters_address']);
            $companyExecutive->setExecutiveCompanyZipcode($form['executives'][$i]['executive_company_zipcode']);
            $companyExecutive->setExecutiveCompanyCity($form['executives'][$i]['executive_company_city']);
            $companyExecutive->setExecutiveCompanyRcs($form['executives'][$i]['executive_company_rcs']);
            $companyExecutive->setExecutiveCompanyRepresentativeName($form['executives'][$i]['executive_company_representative_name']);
            $entityManager->persist($companyExecutive);
        }


        $entityManager->persist($companyIdentity);
        $entityManager->persist($companyStatus);

        $entityManager->flush();


        // $form = (json_decode($request->getContent(), true));

        if ($form === null) {
            return new JsonResponse("Not found", 404);
        }


        if ($form != null && isset($flr)) {
            return new JsonResponse("Success", 200);
        }

        return new JsonResponse("La société a bien été enregistrée", 200);
    }
}