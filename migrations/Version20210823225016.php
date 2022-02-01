<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210823225016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE academie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, annee DATE NOT NULL, date_examen DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE convocation (id INT AUTO_INCREMENT NOT NULL, enseignant_id INT DEFAULT NULL, eleve_id INT DEFAULT NULL, date DATE NOT NULL, INDEX IDX_C03B3F5FE455FCC0 (enseignant_id), INDEX IDX_C03B3F5FA6CC7B2 (eleve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, eleve_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, adresse VARCHAR(100) NOT NULL, date_naiss DATE NOT NULL, INDEX IDX_ECA105F7A6CC7B2 (eleve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, adresse VARCHAR(100) NOT NULL, telephone INT NOT NULL, ville VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, coefficient INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, academie_id INT DEFAULT NULL, code INT NOT NULL, nom VARCHAR(100) NOT NULL, adresse VARCHAR(100) NOT NULL, ville VARCHAR(100) NOT NULL, INDEX IDX_20FD592CB38A0D28 (academie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examen (id INT AUTO_INCREMENT NOT NULL, nom_examen VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, num_incription VARCHAR(100) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, note_obtenue INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE convocation ADD CONSTRAINT FK_C03B3F5FE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE convocation ADD CONSTRAINT FK_C03B3F5FA6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE etablissement ADD CONSTRAINT FK_20FD592CB38A0D28 FOREIGN KEY (academie_id) REFERENCES academie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement DROP FOREIGN KEY FK_20FD592CB38A0D28');
        $this->addSql('ALTER TABLE convocation DROP FOREIGN KEY FK_C03B3F5FA6CC7B2');
        $this->addSql('ALTER TABLE convocation DROP FOREIGN KEY FK_C03B3F5FE455FCC0');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7A6CC7B2');
        $this->addSql('DROP TABLE academie');
        $this->addSql('DROP TABLE convocation');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE epreuve');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE examen');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE note');
    }
}
