<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220827051006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stkpush_results ALTER merchant_request_id TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE stkpush_results ALTER checkout_request_id TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE stkpush_results ALTER response_description TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE stkpush_results ALTER customer_message TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE stkpush_results ALTER merchant_request_id TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE stkpush_results ALTER checkout_request_id TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE stkpush_results ALTER response_description TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE stkpush_results ALTER customer_message TYPE VARCHAR(100)');
    }
}
