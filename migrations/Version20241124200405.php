<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241124200405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, id_etudiant INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_depass VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant_evenement (etudiant_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_C5AD8D69DDEAB1A3 (etudiant_id), INDEX IDX_C5AD8D69FD02F13 (evenement_id), PRIMARY KEY(etudiant_id, evenement_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant_reclamation (etudiant_id INT NOT NULL, reclamation_id INT NOT NULL, INDEX IDX_7E7E5349DDEAB1A3 (etudiant_id), INDEX IDX_7E7E53492D6BA2D9 (reclamation_id), PRIMARY KEY(etudiant_id, reclamation_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant_formation (etudiant_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_8ECBC4C8DDEAB1A3 (etudiant_id), INDEX IDX_8ECBC4C85200282E (formation_id), PRIMARY KEY(etudiant_id, formation_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, administrareur_id INT DEFAULT NULL, id_evenement INT NOT NULL, nom_evenement VARCHAR(255) NOT NULL, type_evenement VARCHAR(255) NOT NULL, date_evenement DATE NOT NULL, particepon LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_B26681E1D357506 (administrareur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur (id INT AUTO_INCREMENT NOT NULL, id_formateur INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_depass VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur_evenement (formateur_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_1922D2A9155D8F51 (formateur_id), INDEX IDX_1922D2A9FD02F13 (evenement_id), PRIMARY KEY(formateur_id, evenement_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, formateur_id INT DEFAULT NULL, id_formation INT NOT NULL, nom_formation VARCHAR(255) NOT NULL, discription VARCHAR(255) NOT NULL, nombre_place INT NOT NULL, session LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_404021BF155D8F51 (formateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, administrareur_id INT DEFAULT NULL, id_reclametion INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_CE6064041D357506 (administrareur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_formation (id INT AUTO_INCREMENT NOT NULL, formation_id INT NOT NULL, formateur_id INT DEFAULT NULL, id_session INT NOT NULL, date_debut DATE NOT NULL, inscrits LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_3A264B55200282E (formation_id), INDEX IDX_3A264B5155D8F51 (formateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etudiant_evenement ADD CONSTRAINT FK_C5AD8D69DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant_evenement ADD CONSTRAINT FK_C5AD8D69FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant_reclamation ADD CONSTRAINT FK_7E7E5349DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant_reclamation ADD CONSTRAINT FK_7E7E53492D6BA2D9 FOREIGN KEY (reclamation_id) REFERENCES reclamation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant_formation ADD CONSTRAINT FK_8ECBC4C8DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant_formation ADD CONSTRAINT FK_8ECBC4C85200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E1D357506 FOREIGN KEY (administrareur_id) REFERENCES administrareur (id)');
        $this->addSql('ALTER TABLE formateur_evenement ADD CONSTRAINT FK_1922D2A9155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formateur_evenement ADD CONSTRAINT FK_1922D2A9FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064041D357506 FOREIGN KEY (administrareur_id) REFERENCES administrareur (id)');
        $this->addSql('ALTER TABLE session_formation ADD CONSTRAINT FK_3A264B55200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE session_formation ADD CONSTRAINT FK_3A264B5155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant_evenement DROP FOREIGN KEY FK_C5AD8D69DDEAB1A3');
        $this->addSql('ALTER TABLE etudiant_evenement DROP FOREIGN KEY FK_C5AD8D69FD02F13');
        $this->addSql('ALTER TABLE etudiant_reclamation DROP FOREIGN KEY FK_7E7E5349DDEAB1A3');
        $this->addSql('ALTER TABLE etudiant_reclamation DROP FOREIGN KEY FK_7E7E53492D6BA2D9');
        $this->addSql('ALTER TABLE etudiant_formation DROP FOREIGN KEY FK_8ECBC4C8DDEAB1A3');
        $this->addSql('ALTER TABLE etudiant_formation DROP FOREIGN KEY FK_8ECBC4C85200282E');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E1D357506');
        $this->addSql('ALTER TABLE formateur_evenement DROP FOREIGN KEY FK_1922D2A9155D8F51');
        $this->addSql('ALTER TABLE formateur_evenement DROP FOREIGN KEY FK_1922D2A9FD02F13');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF155D8F51');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064041D357506');
        $this->addSql('ALTER TABLE session_formation DROP FOREIGN KEY FK_3A264B55200282E');
        $this->addSql('ALTER TABLE session_formation DROP FOREIGN KEY FK_3A264B5155D8F51');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE etudiant_evenement');
        $this->addSql('DROP TABLE etudiant_reclamation');
        $this->addSql('DROP TABLE etudiant_formation');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP TABLE formateur_evenement');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE session_formation');
    }
}
