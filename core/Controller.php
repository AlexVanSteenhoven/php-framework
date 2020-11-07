<?php

/** 
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com> 
 * @package app\core
 */

namespace app\core;

class Controller
{
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}
