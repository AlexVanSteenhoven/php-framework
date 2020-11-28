<?php

/** 
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com> 
 * @package app\core\middlewares
 */

namespace app\core\middlewares;

abstract class BaseMiddleware
{
    abstract public function execute();
}
