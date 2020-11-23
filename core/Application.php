<?php

/**
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com>
 * @package app\core
 */

namespace app\core;

class Application
{
    public static string $root_dir;

    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $database;
    public ?DatabaseModel $user;

    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath, array $config)
    {
        self::$root_dir = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->userClass = $config['userClass'];
        $this->database = new Database($config['db']);

        $primaryValue = $this->session->get('user');

        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    /** @return \app\core\Controller */
    public function getController(): \app\core\Controller
    {
        return $this->controller;
    }

    /** @param \app\core\Controller $controller */
    public function setController(\app\core\Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DatabaseModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->destroy('user');
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }
}
