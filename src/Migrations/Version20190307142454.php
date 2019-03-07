<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190307142454 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, total_amount INT NOT NULL, total_currency_code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carts_products (cart_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_12E5DBFB1AD5CDBF (cart_id), INDEX IDX_12E5DBFB4584665A (product_id), PRIMARY KEY(cart_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carts_products ADD CONSTRAINT FK_12E5DBFB1AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id)');
        $this->addSql('ALTER TABLE carts_products ADD CONSTRAINT FK_12E5DBFB4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carts_products DROP FOREIGN KEY FK_12E5DBFB1AD5CDBF');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE carts_products');
    }
}
