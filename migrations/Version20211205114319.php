<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205114319 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fizjoterapy ADD Nazwa VARCHAR(255) NOT NULL, ADD Opis VARCHAR(500) NOT NULL, ADD Typ enum(\'medyczna\', \'społeczna\'), DROP header, DROP text, CHANGE time Data DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fizjoterapy ADD header VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD text VARCHAR(280) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP Nazwa, DROP Opis, DROP Typ, CHANGE data time DATETIME NOT NULL');
    }
}
