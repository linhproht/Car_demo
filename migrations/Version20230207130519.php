<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230207130519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sale ADD car_id INT NOT NULL, ADD customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_E54BC005C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_E54BC0059395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_E54BC005C3C6F69F ON sale (car_id)');
        $this->addSql('CREATE INDEX IDX_E54BC0059395C3F3 ON sale (customer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sale DROP FOREIGN KEY FK_E54BC005C3C6F69F');
        $this->addSql('ALTER TABLE sale DROP FOREIGN KEY FK_E54BC0059395C3F3');
        $this->addSql('DROP INDEX IDX_E54BC005C3C6F69F ON sale');
        $this->addSql('DROP INDEX IDX_E54BC0059395C3F3 ON sale');
        $this->addSql('ALTER TABLE sale DROP car_id, DROP customer_id');
    }
}
