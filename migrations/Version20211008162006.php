<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211008162006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE opt_ad (id INT AUTO_INCREMENT NOT NULL, currency VARCHAR(3) NOT NULL, urls VARCHAR(255) NOT NULL, tags VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, estimated_revenue VARCHAR(255) NOT NULL, ad_impressions INT NOT NULL, ad_ecpm VARCHAR(4) NOT NULL, clicks INT NOT NULL, ad_ctr VARCHAR(4) NOT NULL, requested_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saved_imgwmeasurement (id INT AUTO_INCREMENT NOT NULL, station_id INT NOT NULL, station VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, temp VARCHAR(255) NOT NULL, wind_dir INT NOT NULL, wind_speed INT NOT NULL, relative_humidity VARCHAR(255) NOT NULL, drop_sum VARCHAR(255) NOT NULL, pressure VARCHAR(255) NOT NULL, requested_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saved_language_recognition_detection (id INT AUTO_INCREMENT NOT NULL, saved_language_recognition_request_id INT NOT NULL, recognized_lang VARCHAR(3) NOT NULL, is_reliable TINYINT(1) NOT NULL, confidence_score VARCHAR(255) NOT NULL, INDEX IDX_4B3403B18C5E5DC8 (saved_language_recognition_request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saved_language_recognition_request (id INT AUTO_INCREMENT NOT NULL, souce_text LONGTEXT NOT NULL, requested_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE saved_language_recognition_detection ADD CONSTRAINT FK_4B3403B18C5E5DC8 FOREIGN KEY (saved_language_recognition_request_id) REFERENCES saved_language_recognition_request (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE saved_language_recognition_detection DROP FOREIGN KEY FK_4B3403B18C5E5DC8');
        $this->addSql('DROP TABLE opt_ad');
        $this->addSql('DROP TABLE saved_imgwmeasurement');
        $this->addSql('DROP TABLE saved_language_recognition_detection');
        $this->addSql('DROP TABLE saved_language_recognition_request');
    }
}
