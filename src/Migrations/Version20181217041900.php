<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181217041900 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE access_tokens (id VARCHAR(255) NOT NULL, client_id VARCHAR(255) DEFAULT NULL, expiry_date_time DATETIME NOT NULL, user_identifier VARCHAR(255) NOT NULL COMMENT \'(DC2Type:UserId)\', INDEX IDX_58D184BC19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE token_scopes (token_id VARCHAR(255) NOT NULL, scope_id VARCHAR(255) NOT NULL, INDEX IDX_5AC4C3241DEE7B9 (token_id), INDEX IDX_5AC4C32682B5931 (scope_id), PRIMARY KEY(token_id, scope_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, secret VARCHAR(255) DEFAULT NULL, redirect_uri LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refresh_tokens (id VARCHAR(255) NOT NULL, access_token_id VARCHAR(255) DEFAULT NULL, expiry_date_time DATETIME NOT NULL, INDEX IDX_9BACE7E12CCB2688 (access_token_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scopes (id VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id VARCHAR(255) NOT NULL COMMENT \'(DC2Type:UserId)\', name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL COMMENT \'(DC2Type:Email)\', password VARCHAR(255) NOT NULL COMMENT \'(DC2Type:Password)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE access_tokens ADD CONSTRAINT FK_58D184BC19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE token_scopes ADD CONSTRAINT FK_5AC4C3241DEE7B9 FOREIGN KEY (token_id) REFERENCES access_tokens (id)');
        $this->addSql('ALTER TABLE token_scopes ADD CONSTRAINT FK_5AC4C32682B5931 FOREIGN KEY (scope_id) REFERENCES scopes (id)');
        $this->addSql('ALTER TABLE refresh_tokens ADD CONSTRAINT FK_9BACE7E12CCB2688 FOREIGN KEY (access_token_id) REFERENCES access_tokens (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE token_scopes DROP FOREIGN KEY FK_5AC4C3241DEE7B9');
        $this->addSql('ALTER TABLE refresh_tokens DROP FOREIGN KEY FK_9BACE7E12CCB2688');
        $this->addSql('ALTER TABLE access_tokens DROP FOREIGN KEY FK_58D184BC19EB6921');
        $this->addSql('ALTER TABLE token_scopes DROP FOREIGN KEY FK_5AC4C32682B5931');
        $this->addSql('DROP TABLE access_tokens');
        $this->addSql('DROP TABLE token_scopes');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE refresh_tokens');
        $this->addSql('DROP TABLE scopes');
        $this->addSql('DROP TABLE users');
    }
}
