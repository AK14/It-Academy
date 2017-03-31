<?php

namespace App\Controllers;

use Classes\view;

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
        $bd = $this->bd();
        $fields = array('name','password');
        $user = $bd->select('users',$fields,"name ='".$name."'");

        $user = array_pop($user);

        if(!empty($user)){
            if($user['password'] <> $pass){
                return ["Message"=>"Введен не правильный пароль"];
            }
            else{
                return $user['name'];
            }
        }
        else{
            return ["Message"=>"Пользователь с таким именем не найден"];
        }
    }


    public function logout()
    {
        $this->view->render('logout');
    }

    public function bd()
    {
        return parent::bd();
    }


}