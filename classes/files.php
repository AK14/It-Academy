<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 2/13/2017
 * Time: 9:19 AM
 */

namespace Classes;


class files
{
    private $file;
    private $type;
    private $size;

    public function __construct($file)
    {
        $this->file = $file;
        $this->size = filesize($this->file);
        $this->type = filetype($this->file);
    }

//  вывод содержимого файла на экран
    public function read()
    {
        $data =  file_get_contents($this->file);

        return $data;
    }

// получаем колт=ичество абзацев в тексте
    public function paragraphs(){
        $get = file($this->file);
        echo count($get);
    }

// получение количества символов
    public function len(){
        $get = strlen($this->read());
        echo $get;
    }

// поиск слов в тексте
    public function preg(){
        $patern = "/Zend/";
        $u = preg_match_all($patern,$this->read());

        echo $u;
    }
}