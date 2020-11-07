<?php

/** 
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com> 
 * @package app\controller
 */

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isPost()) return 'handling data';

        return $this->render('auth.login');
    }

    public function register(Request $request)
    {
        if ($request->isPost()) return 'handling data';

        return $this->render('auth.register');
    }
}
