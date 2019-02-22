<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190222112956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE factures (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date DATE NOT NULL, prix INT NOT NULL, location VARCHAR(255) NOT NULL, INDEX IDX_647590BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_vehicule (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE factures ADD CONSTRAINT FK_647590BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE offre_locations ADD gamme_id INT NOT NULL');
        $this->addSql('ALTER TABLE offre_locations ADD CONSTRAINT FK_4B6EE245D2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gamme (id)');
        $this->addSql('CREATE INDEX IDX_4B6EE245D2FD85F1 ON offre_locations (gamme_id)');
        $this->addSql('ALTER TABLE vehicule ADD type_vehicule_id INT NOT NULL, DROP type');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DD2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gamme (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D153E280 FOREIGN KEY (type_vehicule_id) REFERENCES type_vehicule (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DD2FD85F1 ON vehicule (gamme_id)');
        $this->addSql('CREATE INDEX IDX_292FFF1D153E280 ON vehicule (type_vehicule_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D153E280');
        $this->addSql('DROP TABLE factures');
        $this->addSql('DROP TABLE type_vehicule');
        $this->addSql('ALTER TABLE offre_locations DROP FOREIGN KEY FK_4B6EE245D2FD85F1');
        $this->addSql('DROP INDEX IDX_4B6EE245D2FD85F1 ON offre_locations');
        $this->addSql('ALTER TABLE offre_locations DROP gamme_id');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DD2FD85F1');
        $this->addSql('DROP INDEX IDX_292FFF1DD2FD85F1 ON vehicule');
        $this->addSql('DROP INDEX IDX_292FFF1D153E280 ON vehicule');
        $this->addSql('ALTER TABLE vehicule ADD type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP type_vehicule_id');
    }
}
