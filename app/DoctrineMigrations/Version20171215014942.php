<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171215014942 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE schedule ADD user_id INT DEFAULT NULL, ADD worker_id INT DEFAULT NULL, ADD service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB6B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FBED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_5A3811FBA76ED395 ON schedule (user_id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB6B20BA36 ON schedule (worker_id)');
        $this->addSql('CREATE INDEX IDX_5A3811FBED5CA9E6 ON schedule (service_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, worker_id INT DEFAULT NULL, schedule_id INT DEFAULT NULL, user_id INT DEFAULT NULL, service_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_42C84955A76ED395 (user_id), INDEX IDX_42C849556B20BA36 (worker_id), INDEX IDX_42C84955A40BC2D5 (schedule_id), INDEX IDX_42C84955ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A40BC2D5 FOREIGN KEY (schedule_id) REFERENCES schedule (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FBA76ED395');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB6B20BA36');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FBED5CA9E6');
        $this->addSql('DROP INDEX IDX_5A3811FBA76ED395 ON schedule');
        $this->addSql('DROP INDEX IDX_5A3811FB6B20BA36 ON schedule');
        $this->addSql('DROP INDEX IDX_5A3811FBED5CA9E6 ON schedule');
        $this->addSql('ALTER TABLE schedule DROP user_id, DROP worker_id, DROP service_id');
    }
}
