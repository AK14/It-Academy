<?php
namespace App\Controllers;

use Classes\files;
use Classes\View;
use Classes\Text;
use Classes\DataBase;

class indexController
{
    protected $view;

    public function __construct(){
        $this->view = new View();
    }

    public function hello(){
        return "Добро пожаловать на наш сайт" ;
    }



    public function Text_data($value){

        $d = new Text($value);
        $d = $d->get_data();
        $text = "В тексте\n".$d['par']."\n параграфов, \n".$d['words']."\n слов, ".$d['length']."\n символов";
        $this->view->render('index_page', ['text'=> $text]);
    }

    public function bd($table, $id){
        $i = new DataBase();
        $i->select($table,$id);
    }
}