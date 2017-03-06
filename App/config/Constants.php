<?php

define('APP_BASE_URL', str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
define('APP_BASE_PATH',realpath(__DIR__. DIRECTORY_SEPARATOR.'../../'));
define('DB_HOST','127.0.0.1');
define('DB_DATABASE','guestbook');
define('DB_USER','AK14');
define('DB_PASSWORD','loop');
define('DB_CHARSET','UTF8');
define('DB_PORT','3306');