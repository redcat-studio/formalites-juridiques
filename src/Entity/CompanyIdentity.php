<?php

namespace App\Entity;

use App\Repository\CompanyIdentityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyIdentityRepository::class)
 */
class CompanyIdentity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $head_office_address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rcs_city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=CompanyAssociate::class, mappedBy="compony_id")
     */
    private $companyAssociates;

    /**
     * @ORM\OneToMany(targetEntity=CompanyExecutive::class, mappedBy="company_id")
     */
    private $companyExecutives;

    /**
     * @ORM\OneToMany(targetEntity=Payment::class, mappedBy="company")
     */
    private $payments;

    public function __construct()
    {
        $this->companyAssociates = new ArrayCollection();
        $this->companyExecutives = new ArrayCollection();
        $this->payments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHeadOfficeAddress(): ?string
    {
        return $this->head_office_address;
    }

    public function setHeadOfficeAddress(string $head_office_address): self
    {
        $this->head_office_address = $head_office_address;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getRcsCity(): ?string
    {
        return $this->rcs_city;
    }

    public function setRcsCity(string $rcs_city): self
    {
        $this->rcs_city = $rcs_city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|CompanyAssociate[]
     */
    public function getCompanyAssociates(): Collection
    {
        return $this->companyAssociates;
    }

    public function addCompanyAssociate(CompanyAssociate $companyAssociate): self
    {
        if (!$this->companyAssociates->contains($companyAssociate)) {
            $this->companyAssociates[] = $companyAssociate;
            $companyAssociate->setComponyId($this);
        }

        return $this;
    }

    public function removeCompanyAssociate(CompanyAssociate $companyAssociate): self
    {
        if ($this->companyAssociates->removeElement($companyAssociate)) {
            // set the owning side to null (unless already changed)
            if ($companyAssociate->getComponyId() === $this) {
                $companyAssociate->setComponyId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CompanyExecutive[]
     */
    public function getCompanyExecutives(): Collection
    {
        return $this->companyExecutives;
    }

    public function addCompanyExecutive(CompanyExecutive $companyExecutive): self
    {
        if (!$this->companyExecutives->contains($companyExecutive)) {
            $this->companyExecutives[] = $companyExecutive;
            $companyExecutive->setCompanyId($this);
        }

        return $this;
    }

    public function removeCompanyExecutive(CompanyExecutive $companyExecutive): self
    {
        if ($this->companyExecutives->removeElement($companyExecutive)) {
            // set the owning side to null (unless already changed)
            if ($companyExecutive->getCompanyId() === $this) {
                $companyExecutive->setCompanyId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments[] = $payment;
            $payment->setCompany($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): self
    {
        if ($this->payments->removeElement($payment)) {
            // set the owning side to null (unless already changed)
            if ($payment->getCompany() === $this) {
                $payment->setCompany(null);
            }
        }

        return $this;
    }
}
