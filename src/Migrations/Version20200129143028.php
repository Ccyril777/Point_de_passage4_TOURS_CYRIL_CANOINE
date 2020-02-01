<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200129143028 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE spectator_reservation (spectator_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_EEAAE190523FB688 (spectator_id), INDEX IDX_EEAAE190B83297E7 (reservation_id), PRIMARY KEY(spectator_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE spectator_reservation ADD CONSTRAINT FK_EEAAE190523FB688 FOREIGN KEY (spectator_id) REFERENCES spectator (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE spectator_reservation ADD CONSTRAINT FK_EEAAE190B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE spectator_reservation');
    }
}
