<?php

/** 
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com> 
 * @package app\core
 */

namespace app\core;

use app\core\middlewares\BaseMiddleware;

class Controller
{
    /** @var BaseMiddleware[] */
    protected array $middlewares = [];

    public string  $action = '';

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /** @return BaseMiddleware[] */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

}
