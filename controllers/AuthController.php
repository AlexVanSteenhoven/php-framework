<?php

/** 
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com> 
 * @package app\controller
 */

namespace app\controllers;

use app\core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('auth.login');
    }

    public function register()
    {
        return $this->render('auth.register');
    }
}
