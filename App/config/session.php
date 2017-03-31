<?php
    session_start();
    if (isset($_SESSION['user'])) // Проверка повторного входа
    {
        return 'Вы уже вошли как '.htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8');
        exit();
    }
    if (!empty($_REQUEST['user_name'])) // если из формы пришло не пустое имя
    {
        $user =  new \App\Controllers\loginController();
        $user = $user->auth($_REQUEST['user_name'],$_REQUEST['pass']);
        if(isset($user['message'])){
            echo $user['message'];
        }
        else{
            $_SESSION['user'] = $user;
            Header('Location: http://new/');// редирект
        }
        exit();

        $_SESSION['user'] = $_REQUEST['user_name'];
        $_SESSION['count']=0;

        exit();
    }
    else
    {
        $ErrorMessage = 'Необходимо авторизоваться';
    }
