<?php
namespace App;


use App\Controllers\forumController;
use App\Controllers\indexController;
use App\Controllers\loginController;

class App
{
    private static $controllerName;

    public static function start()
    {
        $url = isset($_GET['url']) ? trim($_GET['url']) : APP_DEFAULT_CONTROLLER;
        $urlParts = explode('/', rtrim($url, '/'));

        $actionParams = array_slice($urlParts,2);

        self::$controllerName = $urlParts[0];
        $controllerName = self::$controllerName . 'Controller';

        // -- в оригинале был этот код, но у меня он не работал Class not found
        //$controller =  new $controllerName;

        // вместо него сделал проверку вызываемого класса через if
        if($controllerName == 'forumController'){
            $controller = new forumController();
        }
        elseif($controllerName == 'loginController'){
            $controller = new loginController();
        }
        elseif($controllerName == 'indexController'){
            $controller = new indexController();
        }




        $actionName = isset($urlParts[1]) ? $urlParts[1] . 'Action' : 'indexAction';

        if(method_exists($controller, $actionName ))
        {
            call_user_func_array(array($controller,$actionName),$actionParams);
        }else
        {
            echo "Произошла ошибка вызова контроллера";
        }
    }

    /**
     * Возвращаем имя текущего контроллера
     */
    public static function getCurrentController()
    {
        return strtolower(self::$controllerName);
    }
}