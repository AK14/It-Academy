<?php
namespace App\Controllers;

use Classes\files;

class indexController
{

    public function hello(){
        return "Добро пожаловать на наш сайт" ;
    }

    public function getText(){
        $data = new files("files/zend.txt");
        $length = $data->len();
        $par = $data->paragraphs();
        $words = $data->words();
        $text = $data->read();

        $attach = compact('words','length','par','text');
        return $attach;
    }

    public function data(){
        $d = $this->getText();
        $text = "В тексте\n".$d['par']."\n параграфов, \n".$d['words']."\n слов, ".$d['length']."\n символов";
        return $text;
    }
}