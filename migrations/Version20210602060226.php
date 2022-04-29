<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210602060226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat CHANGE gender_id gender_id INT DEFAULT NULL, CHANGE job_cat_id job_cat_id INT DEFAULT NULL, CHANGE experience_id experience_id INT DEFAULT NULL, CHANGE availability availability TINYINT(1) DEFAULT NULL, CHANGE active active TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat CHANGE gender_id gender_id INT NOT NULL, CHANGE job_cat_id job_cat_id INT NOT NULL, CHANGE experience_id experience_id INT NOT NULL, CHANGE availability availability TINYINT(1) NOT NULL, CHANGE active active TINYINT(1) NOT NULL');
    }
}
