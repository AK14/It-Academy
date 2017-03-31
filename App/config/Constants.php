<?php

define('APP_BASE_URL', str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
define('APP_BASE_PATH',realpath(__DIR__. DIRECTORY_SEPARATOR.'../../'));
define('APP_DEFAULT_CONTROLLER', 'index');
define('DB_HOST','127.0.0.1');
define('DB_NAME','magaz');
define('DB_USER','AK14');
define('DB_PASSWORD','loop');
define('DB_CHARSET','UTF8');
define('DB_PORT','3306');
define('DB_DSN_MYSQL','mysql:host =' .DB_HOST .';port='.DB_PORT.';dbname='.DB_NAME.';charset='.DB_CHARSET);