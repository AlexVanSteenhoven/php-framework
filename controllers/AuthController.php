<?php

/** 
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com> 
 * @package app\controller
 */

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

use app\models\RegisterModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isPost()) return 'handling data';

        return $this->render('auth.login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();

        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'success';
            }

            return $this->render('auth.register', [
                'model' => $registerModel
            ]);
        }

        return $this->render('auth.register', [
            'model' => $registerModel
        ]);
    }
}
