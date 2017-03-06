<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 3/2/2017
 * Time: 7:27 PM
 */

namespace Classes;

use Classes\files;

/**
 * Class Text
 * @package Classes
 * обработка файла с текстом
 */
class Text
{
    private $data;


    public function __construct($data)
    {
        $this->data = new files($data);
    }


    public function get_data(){

        $length = $this->len();
        $par = 5;
        $words = $this->words();
        $text = $this->data->read();

        $attach = compact('words','length','par','text');
        return $attach;
    }


// получаем колт=ичество абзацев в тексте
    public function paragraphs(){
        $get = file($this->data);
        return count($get);
    }

//  получаем количество слов в тексте
    public function words(){
        $string = $this->data->read();
        $val = str_word_count($string);
        return $val ;
    }

// получение количества символов
    public function len(){
        $string = iconv_strlen($this->data->read());
        return $string;
    }

//  находим самое длинное слово

    public function long_word(){
//  с помощью регулярного выражения получаем все слова
        $pattern = '/[[:word:]]+/' ;
        $result = preg_match_all($pattern,$this->data->read(),$n);
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
        $result = preg_macth_all($pattern,$this->data->read());
        echo $result;
    }
}