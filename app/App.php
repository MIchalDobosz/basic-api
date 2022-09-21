<?php namespace App;

use Dotenv\Dotenv;

class App
{
    private static App $app;

    public static function getInstance(): self
    {
        if (!isset(self::$app))
        {
            self::$app = new self();
        }

        return self::$app;
    }

    private function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
        
        DB::boot();
    }
}