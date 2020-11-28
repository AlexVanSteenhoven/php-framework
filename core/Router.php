<?php

/**
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com>
 * @package app\core
 */

namespace app\core;

use app\core\exception\NotFoundException;
use eftec\bladeone\BladeOne;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    // Rendering views
    protected string $views = __DIR__ . '/../views';
    protected string $cache = __DIR__ . '/../runtime/cache';
    protected BladeOne $blade;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->blade = new BladeOne($this->views, $this->cache, BladeOne::MODE_DEBUG);
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            throw new NotFoundException();
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            /** @var Controller $controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }

        }

        return call_user_func($callback, $this->request, $this->response);
    }

    public function renderView($view, $params = [])
    {
        try {
            return $this->blade->run($view, $params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
