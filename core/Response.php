<?php

/**
 * @author Alex van Steenhoven <alex.steenhoven@gmail.com
 * @package alex\core
 */

namespace alex\core;

class Response
{
    /**
     * @param int $code
     */
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}
