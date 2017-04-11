<?php

namespace App\Controllers;

use Classes\user;

class loginController extends Controller
{
    protected  $view;

    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $this->view->render('login');
    }

    public function auth($name, $pass)
    {
       $user = new user();
       $user->findBy(['name'=>$name,'password'=>$pass]);
        return $user->get();
    }


    public function logoutAction()
    {
        session_destroy();
        header("Location: http://new/");
        exit();
    }

    public function bd()
    {
        return parent::bd();
    }


}