<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200129142207 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE spectator_booking (spectator_id INT NOT NULL, booking_id INT NOT NULL, INDEX IDX_283CF6A9523FB688 (spectator_id), INDEX IDX_283CF6A93301C60 (booking_id), PRIMARY KEY(spectator_id, booking_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE spectator_booking ADD CONSTRAINT FK_283CF6A9523FB688 FOREIGN KEY (spectator_id) REFERENCES spectator (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE spectator_booking ADD CONSTRAINT FK_283CF6A93301C60 FOREIGN KEY (booking_id) REFERENCES booking (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE spectator_booking');
    }
}
