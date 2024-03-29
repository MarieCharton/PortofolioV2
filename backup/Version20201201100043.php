<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201100043 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice ADD platform_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74DFFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id)');
        $this->addSql('CREATE INDEX IDX_E418C74DFFE6496F ON exercice (platform_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74DFFE6496F');
        $this->addSql('DROP INDEX IDX_E418C74DFFE6496F ON exercice');
        $this->addSql('ALTER TABLE exercice DROP platform_id');
    }
}
