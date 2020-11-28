<?php

/**
 * @author Alex van Steenhoven <alex.steenhoven@gmail.com
 * @package app\core\exception
 */

namespace app\core\exception;

class UnauthorizedException extends \Exception
{
    protected $code = 401;
    protected $message = 'You are not authorized to view this page';
}
