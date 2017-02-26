<?php
namespace Classes;

use Classes\my_function;

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
        return count($get);
    }

//  получаем количество слов в тексте
    public function words(){
        $string = $this->read();
        $val = str_word_count($string);
        return $val ;
    }

// получение количества символов
    public function len(){
        $string = iconv_strlen($this->read());
        return $string;
    }

//  находим самое длинное слово

    public function long_word(){
//  с помощью регулярного выражения получаем все слова
        $pattern = '/[[:word:]]+/' ;
        $result = preg_match_all($pattern,$this->read(),$n);
//  переобразовываем массив
        $n = array_shift($n);
        $n = array_unique($n);

//  создал строковую переменную из 1й буквы
//  в цикле вызывал класс my_function, метод для получения самого длинного слова
    $item = 'a';

        foreach($n as $value){
            if(is_array($item)){
                $item = array_values($item);
            }
            $word = new my_function($n);
            $item = $word->get_LongWord($value,$item);
        }

        if(!is_array($item)){
            echo $item;
        }else {
           foreach($item as $value){
               echo $value."<br>";
           };
        }
    }

// количество слов в тексте
    public function preg($item){
        $pattern = "/". $item ."/";
        $result = preg_macth_all($pattern,$this->read());
        echo $result;
    }
}