<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007232310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE opt_ad (id INT AUTO_INCREMENT NOT NULL, currency VARCHAR(3) NOT NULL, urls VARCHAR(255) NOT NULL, tags VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, estimated_revenue VARCHAR(255) NOT NULL, ad_impressions INT NOT NULL, ad_ecpm VARCHAR(4) NOT NULL, clicks INT NOT NULL, ad_ctr VARCHAR(4) NOT NULL, requested_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE opt_ad');
    }
}
