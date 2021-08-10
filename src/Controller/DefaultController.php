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
class DefaultController extends  AbstractController
{ 
    /** 
    * @Route("/", name="homepage") 
    * @Route("/{route}", name="vue_pages", requirements={"route"="^(?!.*api|login|register|logout).+"}) 
    * @Method("GET") 
    */
    public function indexAction(Request $request) { 
        
        $words = ['sky', 'cloud', 'wood', 'rock', 'forest',
        'mountain', 'breeze','rouget sall'];

        
        return $this->render('home/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'controller_name' => 'DefaultController',
            'words' => $words
        ]);
    }
    /**
     * @Route("/api/colors", name="colors_route")
     */
    public function colorsAction()
    {
        return  new JsonResponse(array('colors' => ['red', 'green','blue', 'yellow'], "success" => true));
    }


    /**
     * @Route("/api/company/add", methods={"GET"})
     */
    public function addToBasket( Request $request): JsonResponse
    { 
        $company[]= [
            'identity'=> [
              'name' => 'rougetttt',
              "head_office_address" =>  'SAIILL 123',
              "zipcode" =>  '12345',
              "city" => 'SALLLLL@GMAIILL.COM',
              "rcs_city" => 'Lyon',
              "phone" => '1111222333',
              "email" =>  'SALLLLL@GMAIILL.COM',
              "typecompany" => 'erur'
            ],
            'status' => [
                'head_office_type'=> '',
                'domiciliation_company_name'=> '',
                'domiciliation_company_siren'=> '',
                'company_purpose'=> '',
                'social_capital_type'=> '',
                'social_capital_amount'=> 0,
                'social_capital_min'=> '',
                'social_capital_max'=> '',
                'capital_release_rate'=> '',
                'capital_released_amount'=> '',
                'capital_deposit_date'=> '',
                'capital_deposit_type'=> '',
                'deposit_bank_name'=> '',
                'deposit_bank_address'=> '',
                'deposit_bank_zipcode'=> '',
                'deposit_bank_city'=> '',
                'notary_study_name'=> '',
                'notary_study_address'=> '',
                'notary_study_zipcode'=> '',
                'notary_study_city'=> '',
                'normal_company_exercice_closure_date'=> '',
                'first_company_exercice_closure_data'=> '',
                'business_acronym'=> '',
                'business_commercial_name'=> '',
                'business_domain_name'=> '',
                'business_sign'=> '',
            ]
        ];
        $json = new JsonResponse($company, 200);
// dd( json_decode($json->getContent(), true)[0]['identity']['name']);
      $form = (json_decode($json->getContent(), true))[0];
dd($form);
        //Entreprise
           $companyIdentity = new CompanyIdentity();
           $companyIdentity->setName("rougetttt");
           $companyIdentity->setPhone("1111222333");
           $companyIdentity->setType("RESAI");
           $companyIdentity->setZipcode("12345");
           $companyIdentity->setEmail("SALLLLL@GMAIILL.COM");
           $companyIdentity->setCity("Lyon");
           $companyIdentity->setRcsCity("lyon");
           $companyIdentity->setHeadOfficeAddress("SAIILL 123");
        //Élement Statutaires
           $companyStatus = new CompanyStatus();
           $companyStatus->setCompanyId($companyIdentity);
           $companyStatus->setHeadOfficeType(2);
           $companyStatus->setDomiciliationCompanyName("redccc");
           $companyStatus->setDomiciliationCompanySiren("12456789");
           $companyStatus->setCompanyPurpose("testttttt testtst");
           $companyStatus->setSocialCapitalType("fix");
           $companyStatus->setSocialCapitalAmount(50000);
           $companyStatus->setCapitalDepositDate(new Datetime());
           $companyStatus->setCapitalDepositType("bank");
           $companyStatus->setDepositBankName("clc");
           $companyStatus->setDepositBankAddress("12223 rue lyon");
           $companyStatus->setDepositBankCity("lyon");
           $companyStatus->setDepositBankZipcode("1222");
           $companyStatus->setNormalCompanyExerciceClosureDate("31 juin");
           $companyStatus->setFirstCompanyExerciceClosureData("en 2022");
           $companyStatus->setBusinessAcronym("sigle");
           $companyStatus->setBusinessCommercialName("studio");

        //Associer 

           $companyAssociate = new CompanyAssociate();
           $companyAssociate->setComponyId($companyIdentity);
           $companyAssociate->setAssociateType("physique");
           $companyAssociate->setIndividualGenre("Femme");
           $companyAssociate->setIndividualFirstname("diaop");
           $companyAssociate->setIndividualLastname("rougetttttt");
           $companyAssociate->setIndividualBirthdate(new Datetime());
           $companyAssociate->setIndividualBirthCity("lyon");
           $companyAssociate->setIndividualNationality("fr");
           $companyAssociate->setIndividualAddress("123 av lyon");
           $companyAssociate->setIndividualZipcode("122223");
           $companyAssociate->setIndividualCity("lyon");
           $companyAssociate->setIndividualIsMarriedUnderCommunityOfProperty(false);
           $companyAssociate->setIndividualDidContributedCash(true);
           $companyAssociate->setIndividualDidContributedInKind("false");
           $companyAssociate->setSubjectToWhatIncomeTax("societes");
           $companyAssociate->setSubjectToWhatRealTax("reel simple");
           $companyAssociate->setVatSystem("reel normal");

           
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($companyIdentity);
        $entityManager->persist($companyStatus);
        $entityManager->persist($companyAssociate);
        $entityManager->flush();

        return  new JsonResponse(array('colors' => ['ROUGET', 'SALL','TEST', 'yellow'], "success" => true));
        $form = (json_decode($request->getContent(), true));

        if ($form === null){
            return new JsonResponse("Not found", 404);
        }


        if ($form !== null && isset($flr)) {
            return new JsonResponse("Success", 200);
        }

        return new JsonResponse("Error", 500);
    }
}