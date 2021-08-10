<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210809152822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company_associate ADD associate_contribution_in_kind VARCHAR(255) DEFAULT NULL, DROP individual_did_contributed_cash, CHANGE individual_did_contributed_in_kind associate_cash_contribution VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company_associate ADD individual_did_contributed_cash TINYINT(1) DEFAULT NULL, ADD individual_did_contributed_in_kind VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP associate_cash_contribution, DROP associate_contribution_in_kind');
    }
}
