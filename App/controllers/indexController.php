<?php
namespace App\Controllers;

use Classes\files;
use Classes\View;

class indexController
{
    protected $view;

    public function __construct(){
        $this->view = new View();
    }

    public function hello(){
        return "Добро пожаловать на наш сайт" ;
    }

    public function getText($value){
        $data = new files($value);
        $length = $data->len();
        $par = $data->paragraphs();
        $words = $data->words();
        $text = $data->read();

        $attach = compact('words','length','par','text');
        return $attach;
    }

    public function Text_data($value){
        $d = $this->getText($value);
        $text = "В тексте\n".$d['par']."\n параграфов, \n".$d['words']."\n слов, ".$d['length']."\n символов";
        $this->view->render('index_page', ['text'=> $text]);
    }
}