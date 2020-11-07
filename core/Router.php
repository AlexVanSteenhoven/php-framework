<?php
/**
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com>
 * @package alex\core
 */

namespace alex\core;

use eftec\bladeone\BladeOne;

class Router
{
    protected array $routes = [];
    public Request $request;

    /** @param Request $request */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return "Not found";
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    private function renderView($view)
    {
        $views = __DIR__ . '/../views';
        $cache = __DIR__ . '/../runtime/cache';

        $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
        try {
            return $blade->run($view);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}