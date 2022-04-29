<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531105054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, job_cat_id_id INT NOT NULL, job_type_id_id INT NOT NULL, description VARCHAR(255) NOT NULL, note INT NOT NULL, title VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, closing_date DATETIME NOT NULL, salary INT NOT NULL, creation_date DATETIME NOT NULL, INDEX IDX_288A3A4E99DED506 (id_client_id), UNIQUE INDEX UNIQ_288A3A4E48FC1AB (job_cat_id_id), UNIQUE INDEX UNIQ_288A3A4E1B3F89BD (job_type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E48FC1AB FOREIGN KEY (job_cat_id_id) REFERENCES job_category (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E1B3F89BD FOREIGN KEY (job_type_id_id) REFERENCES job_types (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE job_offer');
    }
}
