<?php namespace App;

use PDO;

class DB
{
    private static PDO $pdo;

    public static function boot()
    {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $port = $_ENV['DB_PORT'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

        self::$pdo = new PDO($dsn, $user, $password, $options);
    }

    public static function __callStatic(string $name, array $args)
    {
        return call_user_func_array([self::$pdo, $name], $args);
    }
}