<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240805182755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chanson (id INT AUTO_INCREMENT NOT NULL, chanson_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_A2E637C22D0460C5 (chanson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chanteur (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disque (id INT AUTO_INCREMENT NOT NULL, chanteur_id INT DEFAULT NULL, name_disque VARCHAR(55) NOT NULL, INDEX IDX_F5ACECA2C7E25364 (chanteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chanson ADD CONSTRAINT FK_A2E637C22D0460C5 FOREIGN KEY (chanson_id) REFERENCES disque (id)');
        $this->addSql('ALTER TABLE disque ADD CONSTRAINT FK_F5ACECA2C7E25364 FOREIGN KEY (chanteur_id) REFERENCES chanteur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chanson DROP FOREIGN KEY FK_A2E637C22D0460C5');
        $this->addSql('ALTER TABLE disque DROP FOREIGN KEY FK_F5ACECA2C7E25364');
        $this->addSql('DROP TABLE chanson');
        $this->addSql('DROP TABLE chanteur');
        $this->addSql('DROP TABLE disque');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
