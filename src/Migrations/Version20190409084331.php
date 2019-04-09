<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190409084331 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "portrait")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "landscape")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "nature")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "sport")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "animal")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "design")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "alien")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "object")');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DELETE FROM tag WHERE label ="portrait"');
        $this->addSql('DELETE FROM tag WHERE label ="landscape"');
        $this->addSql('DELETE FROM tag WHERE label ="nature"');
        $this->addSql('DELETE FROM tag WHERE label ="sport"');
        $this->addSql('DELETE FROM tag WHERE label ="animal"');
        $this->addSql('DELETE FROM tag WHERE label ="design"');
        $this->addSql('DELETE FROM tag WHERE label ="alien"');
        $this->addSql('DELETE FROM tag WHERE label ="object"');

    }
}
