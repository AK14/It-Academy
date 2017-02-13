<?php

//include "classes/ksr1.php";
include "classes/files.php";

//use Classes\ksr1;
use Classes\files;

echo "<form method='post' action='index.php' enctype='multipart/form-data'>
    <head>
    Форма регистрации<br>
    </head>
    <input type='text' name='name'>
    <input type='password' name='pasword'>
    <input type='file' name='file'>
    <input type='submit'>
</form>";
 var_dump($_FILES['file']['name']);

if(isset($_FILES) & $_FILES['file']['error'] == 0){
 move_uploaded_file($_FILES['file']['tmp_name'],'files/'.$_FILES['file']['name']);
}

$search = new files("files/zend.txt");
var_dump( $search->read());

