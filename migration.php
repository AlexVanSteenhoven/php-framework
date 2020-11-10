<?php

/** @author: Alex van Steenhoven <alex.steenhoven@gmail.com> */

use app\controllers\AuthController;
use app\core\Application;
use app\controllers\HomeController;
use app\controllers\ContactController;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'connection' => $_ENV['DB_CONNECTION'],
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'dbname' => $_ENV['DB_DATABASE'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(__DIR__, $config);


$app->database->applyMigrations();
