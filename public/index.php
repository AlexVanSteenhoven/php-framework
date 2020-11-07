<?php

/** @author: Alex van Steenhoven <alex.steenhoven@gmail.com> */

use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');

$app->run();
