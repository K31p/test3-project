<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021120728 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE klas (id INT AUTO_INCREMENT NOT NULL, school_id INT NOT NULL, niveau_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_3944E73AC32A47EE (school_id), INDEX IDX_3944E73AB3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE klas_has_les (id INT AUTO_INCREMENT NOT NULL, klas_id INT NOT NULL, les_id INT NOT NULL, rooster_id INT NOT NULL, vervallen INT DEFAULT NULL, opvang INT DEFAULT NULL, INDEX IDX_C570AD142F3345ED (klas_id), INDEX IDX_C570AD147FAC85EF (les_id), INDEX IDX_C570AD14DFF0C8D8 (rooster_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE les (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rooster (id INT AUTO_INCREMENT NOT NULL, start DATETIME NOT NULL, end DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, klas_id INT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D6492F3345ED (klas_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE klas ADD CONSTRAINT FK_3944E73AC32A47EE FOREIGN KEY (school_id) REFERENCES school (id)');
        $this->addSql('ALTER TABLE klas ADD CONSTRAINT FK_3944E73AB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE klas_has_les ADD CONSTRAINT FK_C570AD142F3345ED FOREIGN KEY (klas_id) REFERENCES klas (id)');
        $this->addSql('ALTER TABLE klas_has_les ADD CONSTRAINT FK_C570AD147FAC85EF FOREIGN KEY (les_id) REFERENCES les (id)');
        $this->addSql('ALTER TABLE klas_has_les ADD CONSTRAINT FK_C570AD14DFF0C8D8 FOREIGN KEY (rooster_id) REFERENCES rooster (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492F3345ED FOREIGN KEY (klas_id) REFERENCES klas (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE klas_has_les DROP FOREIGN KEY FK_C570AD142F3345ED');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492F3345ED');
        $this->addSql('ALTER TABLE klas_has_les DROP FOREIGN KEY FK_C570AD147FAC85EF');
        $this->addSql('ALTER TABLE klas DROP FOREIGN KEY FK_3944E73AB3E9C81');
        $this->addSql('ALTER TABLE klas_has_les DROP FOREIGN KEY FK_C570AD14DFF0C8D8');
        $this->addSql('ALTER TABLE klas DROP FOREIGN KEY FK_3944E73AC32A47EE');
        $this->addSql('DROP TABLE klas');
        $this->addSql('DROP TABLE klas_has_les');
        $this->addSql('DROP TABLE les');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE rooster');
        $this->addSql('DROP TABLE school');
        $this->addSql('DROP TABLE user');
    }
}
