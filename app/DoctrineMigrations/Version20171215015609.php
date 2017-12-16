<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171215015609 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE service DROP reservation, CHANGE price price NUMERIC(10, 0) NOT NULL');
        $this->addSql('ALTER TABLE user DROP reservation');
        $this->addSql('ALTER TABLE worker DROP reservation');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE service ADD reservation VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE price price DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE user ADD reservation VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE worker ADD reservation VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
