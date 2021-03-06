<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190222114449 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vehicule ADD ville_id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D153E280 FOREIGN KEY (type_vehicule_id) REFERENCES type_vehicule (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1D153E280 ON vehicule (type_vehicule_id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DA73F0036 ON vehicule (ville_id)');
        $this->addSql('ALTER TABLE vehicule RENAME INDEX fk_292fff1dd2fd85f1 TO IDX_292FFF1DD2FD85F1');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D153E280');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DA73F0036');
        $this->addSql('DROP INDEX IDX_292FFF1D153E280 ON vehicule');
        $this->addSql('DROP INDEX IDX_292FFF1DA73F0036 ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP ville_id');
        $this->addSql('ALTER TABLE vehicule RENAME INDEX idx_292fff1dd2fd85f1 TO FK_292FFF1DD2FD85F1');
    }
}
