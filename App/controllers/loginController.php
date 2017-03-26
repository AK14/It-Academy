<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 3/24/2017
 * Time: 9:43 PM
 */

namespace App\Controllers;

use Classes\View;


class loginController extends Controller
{
    protected  $view;

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->view->render('login');
    }

    public function logout()
    {
        $this->view->render('logout');
    }

}