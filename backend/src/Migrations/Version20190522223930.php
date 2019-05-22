<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190522223930 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE resource (
          id INT AUTO_INCREMENT NOT NULL, 
          name VARCHAR(255) NOT NULL, 
          has_storage_limit TINYINT(1) NOT NULL, 
          has_box_storage TINYINT(1) NOT NULL, 
          has_storage_protection TINYINT(1) NOT NULL, 
          has_production_rate TINYINT(1) NOT NULL, 
          can_be_looted TINYINT(1) NOT NULL, 
          UNIQUE INDEX UNIQ_BC91F4165E237E06 (name), 
          PRIMARY KEY(id)
        ) ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE resource');
    }
}
