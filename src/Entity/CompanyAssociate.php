<?php

namespace App\Entity;

use App\Repository\CompanyAssociateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyAssociateRepository::class)
 */
class CompanyAssociate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CompanyIdentity::class, inversedBy="companyAssociates")
     */
    private $compony_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $associate_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $individual_genre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $individual_firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $individual_lastname;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $individual_birthdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $individual_birth_city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $individual_nationality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $individual_address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $individual_zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $individual_city;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $individual_is_married_under_community_of_property;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $individual_did_contributed_cash;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    private $individual_did_contributed_in_kind ;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_company_name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $legal_company_rcs_number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_company_headquarters_address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $legal_company_zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_company_city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_company_city_of_registry;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $legal_company_social_capital;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_company_social_form;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_representative_firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_representative_lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_representative_genre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_representative_role;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subject_to_what_income_tax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subject_to_what_real_tax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vat_system;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComponyId(): ?CompanyIdentity
    {
        return $this->compony_id;
    }

    public function setComponyId(?CompanyIdentity $compony_id): self
    {
        $this->compony_id = $compony_id;

        return $this;
    }

    public function getAssociateType(): ?string
    {
        return $this->associate_type;
    }

    public function setAssociateType(string $associate_type): self
    {
        $this->associate_type = $associate_type;

        return $this;
    }

    public function getIndividualGenre(): ?string
    {
        return $this->individual_genre;
    }

    public function setIndividualGenre(?string $individual_genre): self
    {
        $this->individual_genre = $individual_genre;

        return $this;
    }

    public function getIndividualFirstname(): ?string
    {
        return $this->individual_firstname;
    }

    public function setIndividualFirstname(?string $individual_firstname): self
    {
        $this->individual_firstname = $individual_firstname;

        return $this;
    }

    public function getIndividualLastname(): ?string
    {
        return $this->individual_lastname;
    }

    public function setIndividualLastname(?string $individual_lastname): self
    {
        $this->individual_lastname = $individual_lastname;

        return $this;
    }

    public function getIndividualBirthdate(): ?\DateTimeInterface
    {
        return $this->individual_birthdate;
    }

    public function setIndividualBirthdate(?\DateTimeInterface $individual_birthdate): self
    {
        $this->individual_birthdate = $individual_birthdate;

        return $this;
    }

    public function getIndividualBirthCity(): ?string
    {
        return $this->individual_birth_city;
    }

    public function setIndividualBirthCity(?string $individual_birth_city): self
    {
        $this->individual_birth_city = $individual_birth_city;

        return $this;
    }

    public function getIndividualNationality(): ?string
    {
        return $this->individual_nationality;
    }

    public function setIndividualNationality(?string $individual_nationality): self
    {
        $this->individual_nationality = $individual_nationality;

        return $this;
    }

    public function getIndividualAddress(): ?string
    {
        return $this->individual_address;
    }

    public function setIndividualAddress(?string $individual_address): self
    {
        $this->individual_address = $individual_address;

        return $this;
    }

    public function getIndividualZipcode(): ?int
    {
        return $this->individual_zipcode;
    }

    public function setIndividualZipcode(?int $individual_zipcode): self
    {
        $this->individual_zipcode = $individual_zipcode;

        return $this;
    }

    public function getIndividualCity(): ?string
    {
        return $this->individual_city;
    }

    public function setIndividualCity(?string $individual_city): self
    {
        $this->individual_city = $individual_city;

        return $this;
    }

    public function getIndividualIsMarriedUnderCommunityOfProperty(): ?bool
    {
        return $this->individual_is_married_under_community_of_property;
    }

    public function setIndividualIsMarriedUnderCommunityOfProperty(?bool $individual_is_married_under_community_of_property): self
    {
        $this->individual_is_married_under_community_of_property = $individual_is_married_under_community_of_property;

        return $this;
    }

    public function getIndividualDidContributedCash(): ?string
    {
        return $this->individual_did_contributed_cash;
    }

    public function setIndividualDidContributedCash(?string $individual_did_contributed_cash): self
    {
        $this->individual_did_contributed_cash = $individual_did_contributed_cash;

        return $this;
    }

    public function getIndividualDidContributedInKind(): ?string 
    {
        return $this->individual_did_contributed_in_kind;
    }

    public function setIndividualDidContributedInKind(?string  $individual_did_contributed_in_kind): self
    {
        $this->individual_did_contributed_in_kind = $individual_did_contributed_in_kind;

        return $this;
    }

    public function getLegalCompanyName(): ?string
    {
        return $this->legal_company_name;
    }

    public function setLegalCompanyName(?string $legal_company_name): self
    {
        $this->legal_company_name = $legal_company_name;

        return $this;
    }

    public function getLegalCompanyRcsNumber(): ?int
    {
        return $this->legal_company_rcs_number;
    }

    public function setLegalCompanyRcsNumber(?int $legal_company_rcs_number): self
    {
        $this->legal_company_rcs_number = $legal_company_rcs_number;

        return $this;
    }

    public function getLegalCompanyHeadquartersAddress(): ?string
    {
        return $this->legal_company_headquarters_address;
    }

    public function setLegalCompanyHeadquartersAddress(?string $legal_company_headquarters_address): self
    {
        $this->legal_company_headquarters_address = $legal_company_headquarters_address;

        return $this;
    }

    public function getLegalCompanyZipcode(): ?int
    {
        return $this->legal_company_zipcode;
    }

    public function setLegalCompanyZipcode(?int $legal_company_zipcode): self
    {
        $this->legal_company_zipcode = $legal_company_zipcode;

        return $this;
    }

    public function getLegalCompanyCity(): ?string
    {
        return $this->legal_company_city;
    }

    public function setLegalCompanyCity(?string $legal_company_city): self
    {
        $this->legal_company_city = $legal_company_city;

        return $this;
    }

    public function getLegalCompanyCityOfRegistry(): ?string
    {
        return $this->legal_company_city_of_registry;
    }

    public function setLegalCompanyCityOfRegistry(?string $legal_company_city_of_registry): self
    {
        $this->legal_company_city_of_registry = $legal_company_city_of_registry;

        return $this;
    }

    public function getLegalCompanySocialCapital(): ?float
    {
        return $this->legal_company_social_capital;
    }

    public function setLegalCompanySocialCapital(?float $legal_company_social_capital): self
    {
        $this->legal_company_social_capital = $legal_company_social_capital;

        return $this;
    }

    public function getLegalCompanySocialForm(): ?string
    {
        return $this->legal_company_social_form;
    }

    public function setLegalCompanySocialForm(?string $legal_company_social_form): self
    {
        $this->legal_company_social_form = $legal_company_social_form;

        return $this;
    }

    public function getLegalRepresentativeFirstname(): ?string
    {
        return $this->legal_representative_firstname;
    }

    public function setLegalRepresentativeFirstname(?string $legal_representative_firstname): self
    {
        $this->legal_representative_firstname = $legal_representative_firstname;

        return $this;
    }

    public function getLegalRepresentativeLastname(): ?string
    {
        return $this->legal_representative_lastname;
    }

    public function setLegalRepresentativeLastname(?string $legal_representative_lastname): self
    {
        $this->legal_representative_lastname = $legal_representative_lastname;

        return $this;
    }

    public function getLegalRepresentativeGenre(): ?string
    {
        return $this->legal_representative_genre;
    }

    public function setLegalRepresentativeGenre(?string $legal_representative_genre): self
    {
        $this->legal_representative_genre = $legal_representative_genre;

        return $this;
    }

    public function getLegalRepresentativeRole(): ?string
    {
        return $this->legal_representative_role;
    }

    public function setLegalRepresentativeRole(string $legal_representative_role): self
    {
        $this->legal_representative_role = $legal_representative_role;

        return $this;
    }

    public function getSubjectToWhatIncomeTax(): ?string
    {
        return $this->subject_to_what_income_tax;
    }

    public function setSubjectToWhatIncomeTax(?string $subject_to_what_income_tax): self
    {
        $this->subject_to_what_income_tax = $subject_to_what_income_tax;

        return $this;
    }

    public function getSubjectToWhatRealTax(): ?string
    {
        return $this->subject_to_what_real_tax;
    }

    public function setSubjectToWhatRealTax(?string $subject_to_what_real_tax): self
    {
        $this->subject_to_what_real_tax = $subject_to_what_real_tax;

        return $this;
    }

    public function getVatSystem(): ?string
    {
        return $this->vat_system;
    }

    public function setVatSystem(?string $vat_system): self
    {
        $this->vat_system = $vat_system;

        return $this;
    }
}
