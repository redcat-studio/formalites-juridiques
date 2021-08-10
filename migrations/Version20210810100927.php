<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210810100927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company_associate DROP subject_to_what_income_tax, DROP subject_to_what_real_tax, DROP vat_system');
        $this->addSql('ALTER TABLE company_status ADD subject_to_what_income_tax VARCHAR(255) DEFAULT NULL, ADD subject_to_what_real_tax VARCHAR(255) DEFAULT NULL, ADD vat_system VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company_associate ADD subject_to_what_income_tax VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD subject_to_what_real_tax VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD vat_system VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE company_status DROP subject_to_what_income_tax, DROP subject_to_what_real_tax, DROP vat_system');
    }
}
