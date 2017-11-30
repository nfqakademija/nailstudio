<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171130094116 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, duration TIME NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_worker (service_id INT NOT NULL, worker_id INT NOT NULL, INDEX IDX_A175BA54ED5CA9E6 (service_id), INDEX IDX_A175BA546B20BA36 (worker_id), PRIMARY KEY(service_id, worker_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE worker (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, position VARCHAR(100) NOT NULL, about VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workers_services (worker_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_8A93EA446B20BA36 (worker_id), INDEX IDX_8A93EA44ED5CA9E6 (service_id), PRIMARY KEY(worker_id, service_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE service_worker ADD CONSTRAINT FK_A175BA54ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_worker ADD CONSTRAINT FK_A175BA546B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workers_services ADD CONSTRAINT FK_8A93EA446B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workers_services ADD CONSTRAINT FK_8A93EA44ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD picture_url VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6497BA2F5EB ON user (api_token)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6499BE8FD98 ON user (facebook_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649BAF1E635 ON user (facebook_token)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE service_worker DROP FOREIGN KEY FK_A175BA54ED5CA9E6');
        $this->addSql('ALTER TABLE workers_services DROP FOREIGN KEY FK_8A93EA44ED5CA9E6');
        $this->addSql('ALTER TABLE service_worker DROP FOREIGN KEY FK_A175BA546B20BA36');
        $this->addSql('ALTER TABLE workers_services DROP FOREIGN KEY FK_8A93EA446B20BA36');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE service_worker');
        $this->addSql('DROP TABLE worker');
        $this->addSql('DROP TABLE workers_services');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D6497BA2F5EB ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D6499BE8FD98 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649BAF1E635 ON user');
        $this->addSql('ALTER TABLE user DROP picture_url');
    }
}
