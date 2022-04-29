<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607130306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E1B3F89BD');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E48FC1AB');
        $this->addSql('DROP INDEX IDX_288A3A4E1B3F89BD ON job_offer');
        $this->addSql('DROP INDEX IDX_288A3A4E48FC1AB ON job_offer');
        $this->addSql('ALTER TABLE job_offer ADD job_cat_id INT NOT NULL, ADD job_type_id INT NOT NULL, DROP job_cat_id_id, DROP job_type_id_id');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4EB6A984C2 FOREIGN KEY (job_cat_id) REFERENCES job_category (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E5FA33B08 FOREIGN KEY (job_type_id) REFERENCES job_types (id)');
        $this->addSql('CREATE INDEX IDX_288A3A4EB6A984C2 ON job_offer (job_cat_id)');
        $this->addSql('CREATE INDEX IDX_288A3A4E5FA33B08 ON job_offer (job_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4EB6A984C2');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E5FA33B08');
        $this->addSql('DROP INDEX IDX_288A3A4EB6A984C2 ON job_offer');
        $this->addSql('DROP INDEX IDX_288A3A4E5FA33B08 ON job_offer');
        $this->addSql('ALTER TABLE job_offer ADD job_cat_id_id INT NOT NULL, ADD job_type_id_id INT NOT NULL, DROP job_cat_id, DROP job_type_id');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E1B3F89BD FOREIGN KEY (job_type_id_id) REFERENCES job_types (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E48FC1AB FOREIGN KEY (job_cat_id_id) REFERENCES job_category (id)');
        $this->addSql('CREATE INDEX IDX_288A3A4E1B3F89BD ON job_offer (job_type_id_id)');
        $this->addSql('CREATE INDEX IDX_288A3A4E48FC1AB ON job_offer (job_cat_id_id)');
    }
}
