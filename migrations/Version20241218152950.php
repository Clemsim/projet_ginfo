<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241218152950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE formateurs_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE formations_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE formateur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE formation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE formateur (id INT NOT NULL, formation_id INT DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_ED767E4F5200282E ON formateur (formation_id)');
        $this->addSql('CREATE TABLE formation (id INT NOT NULL, nom VARCHAR(255) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE formateur ADD CONSTRAINT FK_ED767E4F5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formateurs DROP CONSTRAINT fk_fd80e5745200282e');
        $this->addSql('DROP TABLE formateurs');
        $this->addSql('DROP TABLE formations');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE formateur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE formation_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE formateurs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE formations_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE formateurs (id INT NOT NULL, formation_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_fd80e5745200282e ON formateurs (formation_id)');
        $this->addSql('CREATE TABLE formations (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE formateurs ADD CONSTRAINT fk_fd80e5745200282e FOREIGN KEY (formation_id) REFERENCES formations (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formateur DROP CONSTRAINT FK_ED767E4F5200282E');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP TABLE formation');
    }
}
