<?php

namespace App\controllers;


class adminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $bd = $this->bd();
        $query = array('*');
        $data = $bd->select('booking',$query);
        $this->view->render('Admin',compact('data'));
    }

    public function helloAction(){
       $data = $_POST;
       $this->view->render('Admin', compact('data'));
    }

    public function isAjax()
    {
        return parent::isAjax(); // TODO: Change the autogenerated stub
    }


    public function bd()
    {
        return parent::bd(); // TODO: Change the autogenerated stub
    }

}