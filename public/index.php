<?php

/** @author: Alex van Steenhoven <alex.steenhoven@gmail.com> */

use app\controllers\AuthController;
use app\core\Application;
use app\controllers\HomeController;
use app\controllers\ContactController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
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

$app = new Application(dirname(__DIR__, 1), $config);

// Routes
$app->router->get('/', [HomeController::class, 'viewHome']);
$app->router->get('/contact', [ContactController::class, 'viewContact']);
$app->router->post('/contact', [ContactController::class, 'handleContact']);

// Auth routes
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();
