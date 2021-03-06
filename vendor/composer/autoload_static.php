<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a1aec45c73c2483604b9888059ae5ec
{
    public static $files = array (
        '5a94794583864f8beba335264cb7760f' => __DIR__ . '/../..' . '/App/config/Constants.php',
        '92a58b8f19e0e935aadfc01538cbd0d1' => __DIR__ . '/../..' . '/App/config/session.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Controllers\\' => 12,
            'Classes\\' => 8,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/controllers',
        ),
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Classes',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'App\\App' => __DIR__ . '/../..' . '/App/App.php',
        'App\\Controllers\\Controller' => __DIR__ . '/../..' . '/App/controllers/Controller.php',
        'App\\Controllers\\busketController' => __DIR__ . '/../..' . '/App/controllers/busketController.php',
        'App\\Controllers\\indexController' => __DIR__ . '/../..' . '/App/controllers/indexController.php',
        'App\\Controllers\\loginController' => __DIR__ . '/../..' . '/App/controllers/loginController.php',
        'App\\config\\db_connect' => __DIR__ . '/../..' . '/App/config/db_connect.php',
        'App\\controllers\\adminController' => __DIR__ . '/../..' . '/App/controllers/adminController.php',
        'Classes\\DataBase' => __DIR__ . '/../..' . '/Classes/DataBase.php',
        'Classes\\View' => __DIR__ . '/../..' . '/Classes/View.php',
        'Classes\\files' => __DIR__ . '/../..' . '/Classes/files.php',
        'Classes\\session' => __DIR__ . '/../..' . '/Classes/session.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a1aec45c73c2483604b9888059ae5ec::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a1aec45c73c2483604b9888059ae5ec::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3a1aec45c73c2483604b9888059ae5ec::$classMap;

        }, null, ClassLoader::class);
    }
}
