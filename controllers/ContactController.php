<?php

/** 
 * @author: Alex van Steenhoven <alex.steenhoven@gmail.com>
 * @package app\controllers
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class ContactController extends Controller
{
    public function viewContact()
    {
        return $this->render('pages.contact');
    }

    public function handleContact(Request $request)
    {
        $request->getBody();
        return 'Handle contact route (POST)';
    }
}
