<?php

/**
 * @author Alex van Steenhoven <alex.steenhoven@gmail.com
 * @package app\core
 */

namespace app\core;

class Response
{
    /** @param int $code */
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    /** @param string $url */
    public function redirect(string $url)
    {
        header("Location: $url");
    }
}
