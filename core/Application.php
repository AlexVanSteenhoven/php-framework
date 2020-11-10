<?php

/**
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com>
 * @package app\core
 */

namespace app\core;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $database;
    public static Application $app;
    public static $root_dir;

    public function __construct($rootPath, array $config)
    {
        self::$root_dir = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

        $this->database = new Database($config['db']);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
