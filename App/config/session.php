<?php
    session_start();
    if (isset($_SESSION['user'])) // Проверка повторного входа
    {
        return 'Вы уже вошли как '.htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8');
        exit();
    }
    if (!empty($_REQUEST['user_name'])) // если из формы пришло не пустое имя
    {
        $_SESSION['user'] = $_REQUEST['user_name'];
        $_SESSION['count']=0;
        Header('Location: http://new/');// редирект
        exit();
    }
    else
    {
        $ErrorMessage = 'Необходимо авторизоваться';
    }
