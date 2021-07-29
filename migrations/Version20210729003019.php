<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210729003019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_items ADD created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE orders ADD created_at DATETIME NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E52FFDEE8D9F6D38 ON orders (order_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_items DROP created_at');
        $this->addSql('DROP INDEX UNIQ_E52FFDEE8D9F6D38 ON orders');
        $this->addSql('ALTER TABLE orders DROP created_at');
    }
}
