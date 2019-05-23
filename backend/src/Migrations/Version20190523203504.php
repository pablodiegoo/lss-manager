<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190523203504 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE base (
          id INT AUTO_INCREMENT NOT NULL, 
          user_id INT NOT NULL, 
          name VARCHAR(255) NOT NULL, 
          level INT NOT NULL, 
          type VARCHAR(255) NOT NULL, 
          class VARCHAR(255) NOT NULL, 
          INDEX IDX_C0B4FE61A76ED395 (user_id), 
          UNIQUE INDEX UNIQ_C0B4FE61A76ED3955E237E06 (user_id, name), 
          PRIMARY KEY(id)
        ) ENGINE = InnoDB');
        $this->addSql('ALTER TABLE base ADD CONSTRAINT FK_C0B4FE61A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE base');
    }
}
