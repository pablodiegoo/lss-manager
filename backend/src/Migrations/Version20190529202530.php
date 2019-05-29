<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190529202530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE 
          base_resource 
        ADD 
          consumption_rate BIGINT DEFAULT 0 NOT NULL, 
          CHANGE storage_amount_timestamp storage_amount_timestamp INT DEFAULT NULL');
        $this->addSql('ALTER TABLE 
          resource 
        ADD 
          has_consumption_rate TINYINT(1) DEFAULT \'0\' NOT NULL AFTER has_production_rate, 
          CHANGE has_storage_limit has_storage_limit TINYINT(1) DEFAULT \'0\' NOT NULL, 
          CHANGE has_box_storage has_box_storage TINYINT(1) DEFAULT \'0\' NOT NULL, 
          CHANGE has_storage_protection has_storage_protection TINYINT(1) DEFAULT \'0\' NOT NULL, 
          CHANGE has_production_rate has_production_rate TINYINT(1) DEFAULT \'0\' NOT NULL, 
          CHANGE can_be_looted can_be_looted TINYINT(1) DEFAULT \'0\' NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE 
          base_resource 
        DROP 
          consumption_rate, 
          CHANGE storage_amount_timestamp storage_amount_timestamp INT NOT NULL');
        $this->addSql('ALTER TABLE 
          resource 
        DROP 
          has_consumption_rate, 
          CHANGE has_storage_limit has_storage_limit TINYINT(1) NOT NULL, 
          CHANGE has_box_storage has_box_storage TINYINT(1) NOT NULL, 
          CHANGE has_storage_protection has_storage_protection TINYINT(1) NOT NULL, 
          CHANGE has_production_rate has_production_rate TINYINT(1) NOT NULL, 
          CHANGE can_be_looted can_be_looted TINYINT(1) NOT NULL');
    }
}
