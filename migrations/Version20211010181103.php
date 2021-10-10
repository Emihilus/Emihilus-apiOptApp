<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211010181103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE opt_ad (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, currency VARCHAR(3) NOT NULL, urls VARCHAR(255) NOT NULL, tags VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, estimated_revenue VARCHAR(255) NOT NULL, ad_impressions INTEGER NOT NULL, ad_ecpm VARCHAR(4) NOT NULL, clicks INTEGER NOT NULL, ad_ctr VARCHAR(4) NOT NULL, requested_at DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE saved_imgwmeasurement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, station_id INTEGER NOT NULL, station VARCHAR(30) NOT NULL, date VARCHAR(30) NOT NULL, "temp" VARCHAR(16) NOT NULL, wind_dir INTEGER NOT NULL, wind_speed INTEGER NOT NULL, relative_humidity VARCHAR(25) NOT NULL, drop_sum VARCHAR(25) NOT NULL, pressure VARCHAR(20) NOT NULL, requested_at DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE saved_language_recognition_detection (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, saved_language_recognition_request_id INTEGER NOT NULL, recognized_lang VARCHAR(3) NOT NULL, is_reliable BOOLEAN NOT NULL, confidence_score VARCHAR(20) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_4B3403B18C5E5DC8 ON saved_language_recognition_detection (saved_language_recognition_request_id)');
        $this->addSql('CREATE TABLE saved_language_recognition_request (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, source_text CLOB NOT NULL, requested_at DATETIME NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE opt_ad');
        $this->addSql('DROP TABLE saved_imgwmeasurement');
        $this->addSql('DROP TABLE saved_language_recognition_detection');
        $this->addSql('DROP TABLE saved_language_recognition_request');
    }
}
