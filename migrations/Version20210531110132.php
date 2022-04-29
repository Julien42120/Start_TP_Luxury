<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531110132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_admin_client DROP INDEX IDX_B751E20B99DED506, ADD UNIQUE INDEX UNIQ_B751E20B99DED506 (id_client_id)');
        $this->addSql('ALTER TABLE job_offer DROP INDEX UNIQ_288A3A4E1B3F89BD, ADD INDEX IDX_288A3A4E1B3F89BD (job_type_id_id)');
        $this->addSql('ALTER TABLE job_offer DROP INDEX UNIQ_288A3A4E48FC1AB, ADD INDEX IDX_288A3A4E48FC1AB (job_cat_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_admin_client DROP INDEX UNIQ_B751E20B99DED506, ADD INDEX IDX_B751E20B99DED506 (id_client_id)');
        $this->addSql('ALTER TABLE job_offer DROP INDEX IDX_288A3A4E48FC1AB, ADD UNIQUE INDEX UNIQ_288A3A4E48FC1AB (job_cat_id_id)');
        $this->addSql('ALTER TABLE job_offer DROP INDEX IDX_288A3A4E1B3F89BD, ADD UNIQUE INDEX UNIQ_288A3A4E1B3F89BD (job_type_id_id)');
    }
}
