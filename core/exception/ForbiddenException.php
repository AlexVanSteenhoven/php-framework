<?php

/**
 * @author Alex van Steenhoven <alex.steenhoven@gmail.com
 * @package app\core\exception
 */

namespace app\core\exception;

class ForbiddenException extends \Exception
{
    protected $code = 403;
    protected $message = 'You don\'t have access to view this page';
}