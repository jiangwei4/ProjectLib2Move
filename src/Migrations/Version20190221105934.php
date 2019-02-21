<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190221105934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gamme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicule ADD gamme_id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DD2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gamme (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DD2FD85F1 ON vehicule (gamme_id)');
        $this->addSql('ALTER TABLE offre_locations ADD name VARCHAR(255) NOT NULL, ADD ville VARCHAR(255) NOT NULL, DROP date_fin');
        $this->addSql('ALTER TABLE locations ADD user_id INT DEFAULT NULL, CHANGE user ville VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE locations ADD CONSTRAINT FK_17E64ABAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_17E64ABAA76ED395 ON locations (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DD2FD85F1');
        $this->addSql('DROP TABLE gamme');
        $this->addSql('ALTER TABLE locations DROP FOREIGN KEY FK_17E64ABAA76ED395');
        $this->addSql('DROP INDEX IDX_17E64ABAA76ED395 ON locations');
        $this->addSql('ALTER TABLE locations DROP user_id, CHANGE ville user VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE offre_locations ADD date_fin DATE NOT NULL, DROP name, DROP ville');
        $this->addSql('DROP INDEX IDX_292FFF1DD2FD85F1 ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP gamme_id');
    }
}
