<?php

/** 
 * @author Alex van Steenhoven <alex.steenhoven@gmail.com>
 *  @package app\controllers
 */

namespace app\controllers;

use app\core\Controller;

class HomeController extends Controller
{
    public function viewHome()
    {
        $params = [
            'name' => 'Alex van Steenhoven'
        ];

        return $this->render('home', $params);
    }
}
