<?php

/**
 * @author Alex van Steenhoven <alex.steenhoven@gmail.com
 * @package app\core\exception
 */

namespace app\core\exception;

class NotFoundException extends \Exception
{
    protected $code = 404;
    protected $message = 'The requested page is not found';
}
