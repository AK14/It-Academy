<?php
namespace App;
use Classes\DataBase;

include ("bootstrap.php");

    $i = new DataBase();
    $data =  array('model'=>'z101','price'=>20);
//    $test = $i->prepareParameters($data, '/');
    $res = $i->update('product',$data,1);


//App::start();






