<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240520174345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activities (id INT NOT NULL, type VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sessions (id INT NOT NULL, user_id INT NOT NULL, activity_id INT NOT NULL, tracking_init_date DATETIME NOT NULL, tracking_finish_date DATETIME NOT NULL, tracking_elapsed_time_value INT NOT NULL, tracking_elapsed_time_unit VARCHAR(255) NOT NULL, tracking_distance_value INT NOT NULL, tracking_distance_unit VARCHAR(255) NOT NULL, INDEX IDX_9A609D13A76ED395 (user_id), INDEX IDX_9A609D1381C06096 (activity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, height INT NOT NULL, weight INT NOT NULL, age INT NOT NULL, distance_goal_value INT NOT NULL, distance_goal_unit VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sessions ADD CONSTRAINT FK_9A609D13A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE sessions ADD CONSTRAINT FK_9A609D1381C06096 FOREIGN KEY (activity_id) REFERENCES activities (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sessions DROP FOREIGN KEY FK_9A609D13A76ED395');
        $this->addSql('ALTER TABLE sessions DROP FOREIGN KEY FK_9A609D1381C06096');
        $this->addSql('DROP TABLE activities');
        $this->addSql('DROP TABLE sessions');
        $this->addSql('DROP TABLE users');
    }
}
