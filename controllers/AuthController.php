<?php

/** 
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com> 
 * @package app\controller
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

use app\models\UserModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isPost()) return 'handling data';

        return $this->render('auth.login');
    }

    public function register(Request $request)
    {
        $user = new UserModel();

        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlashMessage('success', 'Thank you for registering');
                Application::$app->response->redirect('/');
                exit;
            }

            return $this->render('auth.register', [
                'model' => $user
            ]);
        }

        return $this->render('auth.register', [
            'model' => $user
        ]);
    }
}
