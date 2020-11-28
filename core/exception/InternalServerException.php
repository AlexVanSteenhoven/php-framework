<?php

/**
 * @author Alex van Steenhoven <alex.steenhoven@gmail.com
 * @package app\core\exception
 */

namespace app\core\exception;

class InternalServerException extends \Exception
{
    protected $code = 500;
    protected $message = 'The server could not request this page, Due to an Internal Server Error';
}
