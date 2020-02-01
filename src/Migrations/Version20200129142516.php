<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200129142516 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE spectator_booking DROP FOREIGN KEY FK_283CF6A93301C60');
        $this->addSql('ALTER TABLE `show` DROP FOREIGN KEY FK_320ED901B83297E7');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE spectator_booking');
        $this->addSql('DROP INDEX IDX_320ED901B83297E7 ON `show`');
        $this->addSql('ALTER TABLE `show` DROP reservation_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, spectator_id INT NOT NULL, show_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, artist_id INT NOT NULL, show_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, show_id INT NOT NULL, date_id INT NOT NULL, spectator_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE spectator_booking (spectator_id INT NOT NULL, booking_id INT NOT NULL, INDEX IDX_283CF6A93301C60 (booking_id), INDEX IDX_283CF6A9523FB688 (spectator_id), PRIMARY KEY(spectator_id, booking_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE spectator_booking ADD CONSTRAINT FK_283CF6A93301C60 FOREIGN KEY (booking_id) REFERENCES booking (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE spectator_booking ADD CONSTRAINT FK_283CF6A9523FB688 FOREIGN KEY (spectator_id) REFERENCES spectator (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `show` ADD reservation_id INT NOT NULL');
        $this->addSql('ALTER TABLE `show` ADD CONSTRAINT FK_320ED901B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_320ED901B83297E7 ON `show` (reservation_id)');
    }
}
