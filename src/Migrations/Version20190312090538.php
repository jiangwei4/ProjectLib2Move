<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190312090538 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE offre_del_locations_bis (id INT AUTO_INCREMENT NOT NULL, type_vehicule_id INT DEFAULT NULL, gamme_id INT DEFAULT NULL, ville_id INT DEFAULT NULL, INDEX IDX_AE4A7318153E280 (type_vehicule_id), INDEX IDX_AE4A7318D2FD85F1 (gamme_id), INDEX IDX_AE4A7318A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_de_locations_bis (id INT AUTO_INCREMENT NOT NULL, type_vehicule_id INT DEFAULT NULL, gamme_id INT DEFAULT NULL, ville_id INT DEFAULT NULL, km_max INT DEFAULT NULL, prix INT DEFAULT NULL, INDEX IDX_69D282A5153E280 (type_vehicule_id), INDEX IDX_69D282A5D2FD85F1 (gamme_id), INDEX IDX_69D282A5A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offre_del_locations_bis ADD CONSTRAINT FK_AE4A7318153E280 FOREIGN KEY (type_vehicule_id) REFERENCES type_vehicule (id)');
        $this->addSql('ALTER TABLE offre_del_locations_bis ADD CONSTRAINT FK_AE4A7318D2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gamme (id)');
        $this->addSql('ALTER TABLE offre_del_locations_bis ADD CONSTRAINT FK_AE4A7318A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE offre_de_locations_bis ADD CONSTRAINT FK_69D282A5153E280 FOREIGN KEY (type_vehicule_id) REFERENCES type_vehicule (id)');
        $this->addSql('ALTER TABLE offre_de_locations_bis ADD CONSTRAINT FK_69D282A5D2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gamme (id)');
        $this->addSql('ALTER TABLE offre_de_locations_bis ADD CONSTRAINT FK_69D282A5A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE offre_locations ADD type_vehicule_id INT DEFAULT NULL, ADD ville_id INT DEFAULT NULL, DROP type_vehicule, DROP name, DROP ville, CHANGE gamme_id gamme_id INT DEFAULT NULL, CHANGE km_max km_max INT DEFAULT NULL, CHANGE prix prix INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre_locations ADD CONSTRAINT FK_4B6EE245153E280 FOREIGN KEY (type_vehicule_id) REFERENCES type_vehicule (id)');
        $this->addSql('ALTER TABLE offre_locations ADD CONSTRAINT FK_4B6EE245A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_4B6EE245153E280 ON offre_locations (type_vehicule_id)');
        $this->addSql('CREATE INDEX IDX_4B6EE245A73F0036 ON offre_locations (ville_id)');
        $this->addSql('ALTER TABLE vehicule ADD ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DA73F0036 ON vehicule (ville_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE offre_del_locations_bis');
        $this->addSql('DROP TABLE offre_de_locations_bis');
        $this->addSql('ALTER TABLE offre_locations DROP FOREIGN KEY FK_4B6EE245153E280');
        $this->addSql('ALTER TABLE offre_locations DROP FOREIGN KEY FK_4B6EE245A73F0036');
        $this->addSql('DROP INDEX IDX_4B6EE245153E280 ON offre_locations');
        $this->addSql('DROP INDEX IDX_4B6EE245A73F0036 ON offre_locations');
        $this->addSql('ALTER TABLE offre_locations ADD type_vehicule VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD ville VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP type_vehicule_id, DROP ville_id, CHANGE gamme_id gamme_id INT NOT NULL, CHANGE km_max km_max INT NOT NULL, CHANGE prix prix INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DA73F0036');
        $this->addSql('DROP INDEX IDX_292FFF1DA73F0036 ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP ville_id');
    }
}
