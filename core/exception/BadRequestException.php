<?php

/**
 * @author Alex van Steenhoven <alex.steenhoven@gmail.com
 * @package app\core\exception
 */

namespace app\core\exception;

class BadRequestException extends \Exception
{
    protected $code = 400;
    protected $message = 'Bad request';
}
