<?php

namespace App\Entity;

use App\Repository\CompanyExecutiveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyExecutiveRepository::class)
 */
class CompanyExecutive
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CompanyIdentity::class, inversedBy="companyExecutives")
     */
    private $company_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_lastname;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $executive_birthdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_birth_city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_nationality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_mother_firstname_and_maiden_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_father_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_company_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_company_rcs_number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_company_headquarters_address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_company_zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_company_city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_company_rcs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $executive_company_representative_name;

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

    public function getExecutiveTitle(): ?string
    {
        return $this->executive_title;
    }

    public function setExecutiveTitle(?string $executive_title): self
    {
        $this->executive_title = $executive_title;

        return $this;
    }

    public function getExecutiveFirstname(): ?string
    {
        return $this->executive_firstname;
    }

    public function setExecutiveFirstname(?string $executive_firstname): self
    {
        $this->executive_firstname = $executive_firstname;

        return $this;
    }

    public function getExecutiveLastname(): ?string
    {
        return $this->executive_lastname;
    }

    public function setExecutiveLastname(?string $executive_lastname): self
    {
        $this->executive_lastname = $executive_lastname;

        return $this;
    }

    public function getExecutiveBirthdate(): ?\DateTimeInterface
    {
        return $this->executive_birthdate;
    }

    public function setExecutiveBirthdate(?\DateTimeInterface $executive_birthdate): self
    {
        $this->executive_birthdate = $executive_birthdate;

        return $this;
    }

    public function getExecutiveBirthCity(): ?string
    {
        return $this->executive_birth_city;
    }

    public function setExecutiveBirthCity(?string $executive_birth_city): self
    {
        $this->executive_birth_city = $executive_birth_city;

        return $this;
    }

    public function getExecutiveNationality(): ?string
    {
        return $this->executive_nationality;
    }

    public function setExecutiveNationality(?string $executive_nationality): self
    {
        $this->executive_nationality = $executive_nationality;

        return $this;
    }

    public function getExecutiveAddress(): ?string
    {
        return $this->executive_address;
    }

    public function setExecutiveAddress(?string $executive_address): self
    {
        $this->executive_address = $executive_address;

        return $this;
    }

    public function getExecutiveZipcode(): ?string
    {
        return $this->executive_zipcode;
    }

    public function setExecutiveZipcode(?string $executive_zipcode): self
    {
        $this->executive_zipcode = $executive_zipcode;

        return $this;
    }

    public function getExecutiveCity(): ?string
    {
        return $this->executive_city;
    }

    public function setExecutiveCity(?string $executive_city): self
    {
        $this->executive_city = $executive_city;

        return $this;
    }

    public function getExecutiveMotherFirstnameAndMaidenName(): ?string
    {
        return $this->executive_mother_firstname_and_maiden_name;
    }

    public function setExecutiveMotherFirstnameAndMaidenName(?string $executive_mother_firstname_and_maiden_name): self
    {
        $this->executive_mother_firstname_and_maiden_name = $executive_mother_firstname_and_maiden_name;

        return $this;
    }

    public function getExecutiveFatherName(): ?string
    {
        return $this->executive_father_name;
    }

    public function setExecutiveFatherName(?string $executive_father_name): self
    {
        $this->executive_father_name = $executive_father_name;

        return $this;
    }

    public function getExecutiveEmail(): ?string
    {
        return $this->executive_email;
    }

    public function setExecutiveEmail(?string $executive_email): self
    {
        $this->executive_email = $executive_email;

        return $this;
    }

    public function getExecutiveCompanyName(): ?string
    {
        return $this->executive_company_name;
    }

    public function setExecutiveCompanyName(?string $executive_company_name): self
    {
        $this->executive_company_name = $executive_company_name;

        return $this;
    }

    public function getExecutiveCompanyRcsNumber(): ?string
    {
        return $this->executive_company_rcs_number;
    }

    public function setExecutiveCompanyRcsNumber(?string $executive_company_rcs_number): self
    {
        $this->executive_company_rcs_number = $executive_company_rcs_number;

        return $this;
    }

    public function getExecutiveCompanyHeadquartersAddress(): ?string
    {
        return $this->executive_company_headquarters_address;
    }

    public function setExecutiveCompanyHeadquartersAddress(?string $executive_company_headquarters_address): self
    {
        $this->executive_company_headquarters_address = $executive_company_headquarters_address;

        return $this;
    }

    public function getExecutiveCompanyZipcode(): ?string
    {
        return $this->executive_company_zipcode;
    }

    public function setExecutiveCompanyZipcode(?string $executive_company_zipcode): self
    {
        $this->executive_company_zipcode = $executive_company_zipcode;

        return $this;
    }

    public function getExecutiveCompanyCity(): ?string
    {
        return $this->executive_company_city;
    }

    public function setExecutiveCompanyCity(?string $executive_company_city): self
    {
        $this->executive_company_city = $executive_company_city;

        return $this;
    }

    public function getExecutiveCompanyRcs(): ?string
    {
        return $this->executive_company_rcs;
    }

    public function setExecutiveCompanyRcs(?string $executive_company_rcs): self
    {
        $this->executive_company_rcs = $executive_company_rcs;

        return $this;
    }

    public function getExecutiveCompanyRepresentativeName(): ?string
    {
        return $this->executive_company_representative_name;
    }

    public function setExecutiveCompanyRepresentativeName(?string $executive_company_representative_name): self
    {
        $this->executive_company_representative_name = $executive_company_representative_name;

        return $this;
    }
}
