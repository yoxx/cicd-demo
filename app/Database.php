<?php declare(strict_types=1);

namespace App;

use PDO;
use PDOStatement;

final class Database
{
    private static ?Database $instance = null;
    private PDO $dbh;

    private const  MYSQL_DSN = "mysql:host=%s;charset=UTF8;dbname=%s";
    private const PDO_OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    private function __construct(string $user, string $password, string $database, string $host)
    {
        $this->dbh = new PDO(
            sprintf(Database::MYSQL_DSN, $host, $database),
            $user,
            $password,
            Database::PDO_OPTIONS
        );
    }

    private static function initialise(): void
    {
        Database::$instance = new Database(
            getenv("MYSQL_USER") ?: 'root',
            getenv("MYSQL_PASSWORD") ?: '',
            getenv("MYSQL_DATABASE") ?: 'cicd',
            getenv("MYSQL_HOST") ?: '127.0.0.1',
        );
    }

    /** @ignore */
    private function __clone()
    {
    }

    /**
     * Returns the Database handle which first gets created if needed
     * @return PDO $dbh database handle
     */
    public static function getInstance(): PDO
    {
        if (!(Database::$instance instanceof Database)) {
            Database::initialise();
        }
        return Database::$instance->dbh;
    }

    public static function prepare(string $sql): PDOStatement
    {
        return Database::getInstance()->prepare($sql);
    }
}
