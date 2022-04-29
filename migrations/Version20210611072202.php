<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611072202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471B6A984C2');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471B6A984C2 FOREIGN KEY (job_cat_id) REFERENCES job_category (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471B6A984C2');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471B6A984C2 FOREIGN KEY (job_cat_id) REFERENCES job_category (id)');
    }
}
