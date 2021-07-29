<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210727153857 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE company_associate (id INT AUTO_INCREMENT NOT NULL, compony_id_id INT DEFAULT NULL, associate_type VARCHAR(255) NOT NULL, individual_genre VARCHAR(255) DEFAULT NULL, individual_firstname VARCHAR(255) DEFAULT NULL, individual_lastname VARCHAR(255) DEFAULT NULL, individual_birthdate DATETIME DEFAULT NULL, individual_birth_city VARCHAR(255) DEFAULT NULL, individual_nationality VARCHAR(255) DEFAULT NULL, individual_address VARCHAR(255) DEFAULT NULL, individual_zipcode INT DEFAULT NULL, individual_city VARCHAR(255) DEFAULT NULL, individual_is_married_under_community_of_property TINYINT(1) DEFAULT NULL, individual_did_contributed_cash TINYINT(1) DEFAULT NULL, individual_did_contributed_in_kind LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', legal_company_name VARCHAR(255) DEFAULT NULL, legal_company_rcs_number INT DEFAULT NULL, legal_company_headquarters_address VARCHAR(255) DEFAULT NULL, legal_company_zipcode INT DEFAULT NULL, legal_company_city VARCHAR(255) DEFAULT NULL, legal_company_city_of_registry VARCHAR(255) DEFAULT NULL, legal_company_social_capital DOUBLE PRECISION DEFAULT NULL, legal_company_social_form VARCHAR(255) DEFAULT NULL, legal_representative_firstname VARCHAR(255) DEFAULT NULL, legal_representative_lastname VARCHAR(255) DEFAULT NULL, legal_representative_genre VARCHAR(255) DEFAULT NULL, legal_representative_role VARCHAR(255) DEFAULT NULL, subject_to_what_income_tax VARCHAR(255) DEFAULT NULL, subject_to_what_real_tax VARCHAR(255) DEFAULT NULL, vat_system VARCHAR(255) DEFAULT NULL, INDEX IDX_3FD5D7D5F077E7A0 (compony_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_executive (id INT AUTO_INCREMENT NOT NULL, company_id_id INT DEFAULT NULL, executive_title VARCHAR(255) DEFAULT NULL, executive_firstname VARCHAR(255) DEFAULT NULL, executive_lastname VARCHAR(255) DEFAULT NULL, executive_birthdate DATETIME DEFAULT NULL, executive_birth_city VARCHAR(255) DEFAULT NULL, executive_nationality VARCHAR(255) DEFAULT NULL, executive_address VARCHAR(255) DEFAULT NULL, executive_zipcode VARCHAR(255) DEFAULT NULL, executive_city VARCHAR(255) DEFAULT NULL, executive_mother_firstname_and_maiden_name VARCHAR(255) DEFAULT NULL, executive_father_name VARCHAR(255) DEFAULT NULL, executive_email VARCHAR(255) DEFAULT NULL, executive_company_name VARCHAR(255) DEFAULT NULL, executive_company_rcs_number VARCHAR(255) DEFAULT NULL, executive_company_headquarters_address VARCHAR(255) DEFAULT NULL, executive_company_zipcode VARCHAR(255) DEFAULT NULL, executive_company_city VARCHAR(255) DEFAULT NULL, executive_company_rcs VARCHAR(255) DEFAULT NULL, executive_company_representative_name VARCHAR(255) DEFAULT NULL, INDEX IDX_3D692D5A38B53C32 (company_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_identity (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, head_office_address VARCHAR(255) NOT NULL, zipcode VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, rcs_city VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_status (id INT AUTO_INCREMENT NOT NULL, company_id_id INT DEFAULT NULL, head_office_type INT DEFAULT NULL, domiciliation_company_name VARCHAR(255) DEFAULT NULL, domiciliation_company_siren VARCHAR(255) DEFAULT NULL, company_purpose LONGTEXT DEFAULT NULL, social_capital_type VARCHAR(255) DEFAULT NULL, social_capital_amount NUMERIC(50, 2) DEFAULT NULL, social_capital_min DOUBLE PRECISION DEFAULT NULL, social_capital_max DOUBLE PRECISION DEFAULT NULL, capital_release_rate INT DEFAULT NULL, capital_released_amount DOUBLE PRECISION DEFAULT NULL, capital_deposit_date DATETIME DEFAULT NULL, capital_deposit_type VARCHAR(255) DEFAULT NULL, deposit_bank_name VARCHAR(255) DEFAULT NULL, deposit_bank_address VARCHAR(255) DEFAULT NULL, deposit_bank_zipcode VARCHAR(255) DEFAULT NULL, deposit_bank_city VARCHAR(255) DEFAULT NULL, notary_study_name VARCHAR(255) DEFAULT NULL, notary_study_address VARCHAR(255) DEFAULT NULL, notary_study_zipcode VARCHAR(255) DEFAULT NULL, notary_study_city VARCHAR(255) DEFAULT NULL, normal_company_exercice_closure_date VARCHAR(255) DEFAULT NULL, first_company_exercice_closure_data VARCHAR(255) DEFAULT NULL, business_acronym VARCHAR(255) DEFAULT NULL, business_commercial_name VARCHAR(255) DEFAULT NULL, business_domain_name VARCHAR(255) DEFAULT NULL, business_sign VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_469F016938B53C32 (company_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company_associate ADD CONSTRAINT FK_3FD5D7D5F077E7A0 FOREIGN KEY (compony_id_id) REFERENCES company_identity (id)');
        $this->addSql('ALTER TABLE company_executive ADD CONSTRAINT FK_3D692D5A38B53C32 FOREIGN KEY (company_id_id) REFERENCES company_identity (id)');
        $this->addSql('ALTER TABLE company_status ADD CONSTRAINT FK_469F016938B53C32 FOREIGN KEY (company_id_id) REFERENCES company_identity (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE company_associate DROP FOREIGN KEY FK_3FD5D7D5F077E7A0');
        $this->addSql('ALTER TABLE company_executive DROP FOREIGN KEY FK_3D692D5A38B53C32');
        $this->addSql('ALTER TABLE company_status DROP FOREIGN KEY FK_469F016938B53C32');
        $this->addSql('DROP TABLE company_associate');
        $this->addSql('DROP TABLE company_executive');
        $this->addSql('DROP TABLE company_identity');
        $this->addSql('DROP TABLE company_status');
    }
}
