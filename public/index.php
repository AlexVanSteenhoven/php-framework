<?php

/** @author: Alex van Steenhoven <alex.steenhoven@gmail.com> */

use app\controllers\AuthController;
use app\core\Application;
use app\controllers\HomeController;
use app\controllers\ContactController;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();

// Routes
$app->router->get('/', [HomeController::class, 'viewHome']);
$app->router->get('/contact', [ContactController::class, 'viewContact']);
$app->router->post('/contact', [ContactController::class, 'handleContact']);

// Auth routes
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();
