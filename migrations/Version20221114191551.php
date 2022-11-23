<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221114191551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salaire ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salaire ADD CONSTRAINT FK_3BCBBD11A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3BCBBD11A76ED395 ON salaire (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salaire DROP FOREIGN KEY FK_3BCBBD11A76ED395');
        $this->addSql('DROP INDEX IDX_3BCBBD11A76ED395 ON salaire');
        $this->addSql('ALTER TABLE salaire DROP user_id');
    }
}
