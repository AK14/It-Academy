<?php

use App\Controllers\forumController;
// если было отправка методом POST
    if(isset($_POST) and !empty($_POST)  ){
        $bd = new forumController();
        $bd->store($_POST);
    }
?>
<section class="container">
<!--    форма добавления нового комментария -->
    <form class="form-horizontal col-md-6 col-md-offset-3" method="post" action="">
        <div class="form-group">
            <label for="user"> Автор </label>
            <input type="text" class="form-control" name="user" >
        </div>
        <div class="form-group">
            <label for="message"> Сообщение </label>
            <textarea class="form-control" name="message"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn bg-info" value="submit">
        </div>
    </form>

    <?php
        foreach($data as $value) {
            echo "<br>";
            echo "<p class='col-md-6 col-md-offset-3 bg-warning'>";
            echo $value['user'] ."\t" .$value['message_time']. "<br>";
            echo $value['message'] .'<br>';
            echo "</p>";

        }
    ?>
</section>


