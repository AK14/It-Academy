<?php

//include "classes/ksr1.php";
include "classes/files.php";

//use Classes\ksr1;
use Classes\files;
echo '<div class="jumbotron">';
echo " перейти на <a href='./resource/view/forum.php'> Форум </a><br>";
echo '</div>';


/*echo "<form method='post' action='index.php' enctype='multipart/form-data'>
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



// Создаем объект класса files
$search = new files("files/zend.txt");

// Вызываем методы класса.
echo $search->read()."<br>";
echo $search->words()."<br>";
echo $search->len()."<br>";
$search->long_word();



