<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 2/16/2017
 * Time: 7:14 PM
 */

namespace Classes;


class my_function
{


    public function __construct()
    {
    }


    public function get_length($val){
        if(is_array($val)){
            $word = $val[''];
            return strlen($word);
        }else{
            return strlen($val);
        }
    }

    public function get_LongWord($val1,  $val2)
    {
        if ($this->get_length($val1) > $this->get_length($val2)) {
            return $val1;
        } elseif ($this->get_length($val1) == $this->get_length($val2)) {
            return $val2 = array($val1, $val2);
        } else return $val2;
    }
}