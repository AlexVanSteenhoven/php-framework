<?php

/**
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com>
 * @package alex\core
 */

namespace alex\core;

use alex\core\Router;
use alex\core\Request;

class Application
{
    public Router $router;
    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
