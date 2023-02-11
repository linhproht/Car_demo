<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230206132517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carsup (id INT AUTO_INCREMENT NOT NULL, cars_id INT NOT NULL, sups_id INT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_E3CC03B8702F506 (cars_id), INDEX IDX_E3CC03B25B7A25 (sups_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carsup ADD CONSTRAINT FK_E3CC03B8702F506 FOREIGN KEY (cars_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE carsup ADD CONSTRAINT FK_E3CC03B25B7A25 FOREIGN KEY (sups_id) REFERENCES supplier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carsup DROP FOREIGN KEY FK_E3CC03B8702F506');
        $this->addSql('ALTER TABLE carsup DROP FOREIGN KEY FK_E3CC03B25B7A25');
        $this->addSql('DROP TABLE carsup');
    }
}
