<?php

/**
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com>
 * @package app\core
 */

namespace app\core;

use \PDO;
use Codedungeon\PHPCliColors\Color;


class Database
{
    public PDO $pdo;

    public function __construct(array $config)
    {
        $dsn = $config['connection'] . ":host=" . $config['host'] . ";port=" . $config['port'] . ";dbname=" . $config['dbname'] ?? '';
        $user = $config['username'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];

        $files = scandir(basename('/migrations'));
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once Application::$root_dir . '/migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);

            $instance = new $className();
            $this->log("Applying: " . $migration);
            $instance->up();
            $this->log("Applied: " . $migration);

            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("All migrations are applied!");
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {
        $stmt = $this->pdo->prepare("SELECT migration FROM migrations");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $str = implode(',', array_map(fn ($m) => "('$m')", $migrations));
        $stmt = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $str");
        $stmt->execute();
    }

    public function resetDatabase()
    {
        $stmt_users = $this->prepare("DROP TABLE users");
        $stmt_users->execute();

        $this->log("Deleted users table");

        $stmt_migrations = $this->prepare("DROP TABLE migrations");
        $stmt_migrations->execute();

        $this->log("Deleted migrations table");
    }

    public function cleanDatabase()
    {
        $stmt_users = $this->prepare("DELETE FROM users");
        $stmt_users->execute();
        $this->log("Cleaned Data from users table (empty table)");

        $stmt_migrations = $this->prepare("DELETE FROM migrations");
        $stmt_migrations->execute();
        $this->log("Cleaned Data from migrations table (empty table)");
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    protected function log($message)
    {
        date_default_timezone_set('Europe/Amsterdam');
        echo Color::LIGHT_GREEN . '[' . date('d-m-Y H:i:s') . '] ' . Color::RESET . $message . PHP_EOL;
    }
}
