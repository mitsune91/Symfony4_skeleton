<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190813130420 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE support (id INT AUTO_INCREMENT NOT NULL, produit_id_id INT DEFAULT NULL, type_support VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, INDEX IDX_8004EBA54FD8F9C3 (produit_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE streaming (id INT AUTO_INCREMENT NOT NULL, produit_id_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, prix INT NOT NULL, qualitã© VARCHAR(255) NOT NULL, INDEX IDX_264318614FD8F9C3 (produit_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, music_style VARCHAR(255) DEFAULT NULL, presentation LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, collection VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, artiste_id_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, date_production DATETIME NOT NULL, presentation VARCHAR(255) DEFAULT NULL, INDEX IDX_29A5EC27B6D84A9 (artiste_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, numero_commande INT NOT NULL, date_commande DATETIME NOT NULL, prix_commande INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, artiste_id_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, lieu VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, prix INT NOT NULL, INDEX IDX_B26681EB6D84A9 (artiste_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_commande (id INT AUTO_INCREMENT NOT NULL, support_id_id INT DEFAULT NULL, commande_id INT DEFAULT NULL, numero_commande INT NOT NULL, numero_support INT NOT NULL, INDEX IDX_98344FA68DFE888F (support_id_id), INDEX IDX_98344FA682EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, thematique VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, date_publication VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actualite_user (actualite_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C63578C2A2843073 (actualite_id), INDEX IDX_C63578C2A76ED395 (user_id), PRIMARY KEY(actualite_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE support ADD CONSTRAINT FK_8004EBA54FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE streaming ADD CONSTRAINT FK_264318614FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27B6D84A9 FOREIGN KEY (artiste_id_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EB6D84A9 FOREIGN KEY (artiste_id_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA68DFE888F FOREIGN KEY (support_id_id) REFERENCES support (id)');
        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA682EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE actualite_user ADD CONSTRAINT FK_C63578C2A2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualite_user ADD CONSTRAINT FK_C63578C2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA68DFE888F');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27B6D84A9');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EB6D84A9');
        $this->addSql('ALTER TABLE actualite_user DROP FOREIGN KEY FK_C63578C2A76ED395');
        $this->addSql('ALTER TABLE support DROP FOREIGN KEY FK_8004EBA54FD8F9C3');
        $this->addSql('ALTER TABLE streaming DROP FOREIGN KEY FK_264318614FD8F9C3');
        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA682EA2E54');
        $this->addSql('ALTER TABLE actualite_user DROP FOREIGN KEY FK_C63578C2A2843073');
        $this->addSql('DROP TABLE support');
        $this->addSql('DROP TABLE streaming');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE detail_commande');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE actualite_user');
    }
}
