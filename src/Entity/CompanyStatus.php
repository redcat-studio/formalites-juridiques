<?php

namespace App\Entity;

use App\Repository\CompanyStatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyStatusRepository::class)
 */
class CompanyStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CompanyIdentity::class, cascade={"persist", "remove"})
     */
    private $company_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $head_office_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domiciliation_company_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domiciliation_company_siren;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $company_purpose;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $social_capital_type;

    /**
     * @ORM\Column(type="decimal", precision=50, scale=2, nullable=true)
     */
    private $social_capital_amount;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $social_capital_min;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $social_capital_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $capital_release_rate;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $capital_released_amount;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $capital_deposit_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $capital_deposit_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deposit_bank_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deposit_bank_address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deposit_bank_zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deposit_bank_city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notary_study_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notary_study_address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notary_study_zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notary_study_city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $normal_company_exercice_closure_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $first_company_exercice_closure_data;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $business_acronym;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $business_commercial_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $business_domain_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $business_sign;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyId(): ?CompanyIdentity
    {
        return $this->company_id;
    }

    public function setCompanyId(?CompanyIdentity $company_id): self
    {
        $this->company_id = $company_id;

        return $this;
    }

    public function getHeadOfficeType(): ?int
    {
        return $this->head_office_type;
    }

    public function setHeadOfficeType(?int $head_office_type): self
    {
        $this->head_office_type = $head_office_type;

        return $this;
    }

    public function getDomiciliationCompanyName(): ?string
    {
        return $this->domiciliation_company_name;
    }

    public function setDomiciliationCompanyName(?string $domiciliation_company_name): self
    {
        $this->domiciliation_company_name = $domiciliation_company_name;

        return $this;
    }

    public function getDomiciliationCompanySiren(): ?string
    {
        return $this->domiciliation_company_siren;
    }

    public function setDomiciliationCompanySiren(?string $domiciliation_company_siren): self
    {
        $this->domiciliation_company_siren = $domiciliation_company_siren;

        return $this;
    }

    public function getCompanyPurpose(): ?string
    {
        return $this->company_purpose;
    }

    public function setCompanyPurpose(?string $company_purpose): self
    {
        $this->company_purpose = $company_purpose;

        return $this;
    }

    public function getSocialCapitalType(): ?string
    {
        return $this->social_capital_type;
    }

    public function setSocialCapitalType(?string $social_capital_type): self
    {
        $this->social_capital_type = $social_capital_type;

        return $this;
    }

    public function getSocialCapitalAmount(): ?string
    {
        return $this->social_capital_amount;
    }

    public function setSocialCapitalAmount(?string $social_capital_amount): self
    {
        $this->social_capital_amount = $social_capital_amount;

        return $this;
    }

    public function getSocialCapitalMin(): ?float
    {
        return $this->social_capital_min;
    }

    public function setSocialCapitalMin(?float $social_capital_min): self
    {
        $this->social_capital_min = $social_capital_min;

        return $this;
    }

    public function getSocialCapitalMax(): ?float
    {
        return $this->social_capital_max;
    }

    public function setSocialCapitalMax(?float $social_capital_max): self
    {
        $this->social_capital_max = $social_capital_max;

        return $this;
    }

    public function getCapitalReleaseRate(): ?int
    {
        return $this->capital_release_rate;
    }

    public function setCapitalReleaseRate(?int $capital_release_rate): self
    {
        $this->capital_release_rate = $capital_release_rate;

        return $this;
    }

    public function getCapitalReleasedAmount(): ?float
    {
        return $this->capital_released_amount;
    }

    public function setCapitalReleasedAmount(?float $capital_released_amount): self
    {
        $this->capital_released_amount = $capital_released_amount;

        return $this;
    }

    public function getCapitalDepositDate(): ?\DateTimeInterface
    {
        return $this->capital_deposit_date;
    }

    public function setCapitalDepositDate(?\DateTimeInterface $capital_deposit_date): self
    {
        $this->capital_deposit_date = $capital_deposit_date;

        return $this;
    }

    public function getCapitalDepositType(): ?string
    {
        return $this->capital_deposit_type;
    }

    public function setCapitalDepositType(?string $capital_deposit_type): self
    {
        $this->capital_deposit_type = $capital_deposit_type;

        return $this;
    }

    public function getDepositBankName(): ?string
    {
        return $this->deposit_bank_name;
    }

    public function setDepositBankName(?string $deposit_bank_name): self
    {
        $this->deposit_bank_name = $deposit_bank_name;

        return $this;
    }

    public function getDepositBankAddress(): ?string
    {
        return $this->deposit_bank_address;
    }

    public function setDepositBankAddress(?string $deposit_bank_address): self
    {
        $this->deposit_bank_address = $deposit_bank_address;

        return $this;
    }

    public function getDepositBankZipcode(): ?string
    {
        return $this->deposit_bank_zipcode;
    }

    public function setDepositBankZipcode(?string $deposit_bank_zipcode): self
    {
        $this->deposit_bank_zipcode = $deposit_bank_zipcode;

        return $this;
    }

    public function getDepositBankCity(): ?string
    {
        return $this->deposit_bank_city;
    }

    public function setDepositBankCity(?string $deposit_bank_city): self
    {
        $this->deposit_bank_city = $deposit_bank_city;

        return $this;
    }

    public function getNotaryStudyName(): ?string
    {
        return $this->notary_study_name;
    }

    public function setNotaryStudyName(?string $notary_study_name): self
    {
        $this->notary_study_name = $notary_study_name;

        return $this;
    }

    public function getNotaryStudyAddress(): ?string
    {
        return $this->notary_study_address;
    }

    public function setNotaryStudyAddress(?string $notary_study_address): self
    {
        $this->notary_study_address = $notary_study_address;

        return $this;
    }

    public function getNotaryStudyZipcode(): ?string
    {
        return $this->notary_study_zipcode;
    }

    public function setNotaryStudyZipcode(?string $notary_study_zipcode): self
    {
        $this->notary_study_zipcode = $notary_study_zipcode;

        return $this;
    }

    public function getNotaryStudyCity(): ?string
    {
        return $this->notary_study_city;
    }

    public function setNotaryStudyCity(?string $notary_study_city): self
    {
        $this->notary_study_city = $notary_study_city;

        return $this;
    }

    public function getNormalCompanyExerciceClosureDate(): ?string
    {
        return $this->normal_company_exercice_closure_date;
    }

    public function setNormalCompanyExerciceClosureDate(?string $normal_company_exercice_closure_date): self
    {
        $this->normal_company_exercice_closure_date = $normal_company_exercice_closure_date;

        return $this;
    }

    public function getFirstCompanyExerciceClosureData(): ?string
    {
        return $this->first_company_exercice_closure_data;
    }

    public function setFirstCompanyExerciceClosureData(?string $first_company_exercice_closure_data): self
    {
        $this->first_company_exercice_closure_data = $first_company_exercice_closure_data;

        return $this;
    }

    public function getBusinessAcronym(): ?string
    {
        return $this->business_acronym;
    }

    public function setBusinessAcronym(?string $business_acronym): self
    {
        $this->business_acronym = $business_acronym;

        return $this;
    }

    public function getBusinessCommercialName(): ?string
    {
        return $this->business_commercial_name;
    }

    public function setBusinessCommercialName(?string $business_commercial_name): self
    {
        $this->business_commercial_name = $business_commercial_name;

        return $this;
    }

    public function getBusinessDomainName(): ?string
    {
        return $this->business_domain_name;
    }

    public function setBusinessDomainName(?string $business_domain_name): self
    {
        $this->business_domain_name = $business_domain_name;

        return $this;
    }

    public function getBusinessSign(): ?string
    {
        return $this->business_sign;
    }

    public function setBusinessSign(?string $business_sign): self
    {
        $this->business_sign = $business_sign;

        return $this;
    }
}
