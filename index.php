<?php
namespace App;
include ("bootstrap.php");

use App\Controllers\indexController;


//echo " перейти на <a href='./resource/view/forum.php'> Форум </a><br>";

// вызываем контроллер который обробатывает файл
$i = new indexController();
//$data = ["user"=>"Arseni","message"=>"Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я. Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого. Ни одного штриха не мог"];
$fields = array('id_messages','user','message','message_time');

$data =$i->bd()->select('messages',$fields);
echo "<pre>";
print_r($data);
echo "</pre>";
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



