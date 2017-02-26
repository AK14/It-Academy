<?php
namespace App;
include ("bootstrap.php");

use App\Controllers\indexController;


//echo " перейти на <a href='./resource/view/forum.php'> Форум </a><br>";

// вызываем контроллер который обробатывает файл
$i = new indexController();
//echo $i->hello()."<br>";
$i->Text_data('files/zend.txt');


/*

  echo "<form method='post' action='index.php' enctype='multipart/form-data'>
    <head>
    Форма регистрации<br>
    </head>
    <input type='text' name='name'>
    <input type='password' name='pasword'>
    <input type='file' name='file'>
    <input type='submit'>
</form>";


if(isset($_FILES) & $_FILES['file']['error'] == 0){
 move_uploaded_file($_FILES['file']['tmp_name'],'files/'.$_FILES['file']['name']);
}
*/



