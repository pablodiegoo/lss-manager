<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190527192204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE base_resource (
          id INT AUTO_INCREMENT NOT NULL, 
          base_id INT NOT NULL, 
          resource_id INT NOT NULL, 
          storage_amount BIGINT DEFAULT 0 NOT NULL, 
          storage_amount_timestamp INT NOT NULL, 
          box_amount BIGINT DEFAULT 0 NOT NULL, 
          storage_limit BIGINT DEFAULT 0 NOT NULL, 
          storage_protection BIGINT DEFAULT 0 NOT NULL, 
          production_rate BIGINT DEFAULT 0 NOT NULL, 
          INDEX IDX_F67A57EE6967DF41 (base_id), 
          INDEX IDX_F67A57EE89329D25 (resource_id), 
          UNIQUE INDEX UNIQ_F67A57EE6967DF4189329D25 (base_id, resource_id), 
          PRIMARY KEY(id)
        ) ENGINE = InnoDB');
        $this->addSql('ALTER TABLE 
          base_resource 
        ADD 
          CONSTRAINT FK_F67A57EE6967DF41 FOREIGN KEY (base_id) REFERENCES base (id)');
        $this->addSql('ALTER TABLE 
          base_resource 
        ADD 
          CONSTRAINT FK_F67A57EE89329D25 FOREIGN KEY (resource_id) REFERENCES resource (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE base_resource');
    }
}
