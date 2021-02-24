<?php

require 'application/lib/dev.php';

use application\classes\Router;
// автозагрузка классов
spl_autoload_register(function ($class) {
    $controllerName =  str_replace('\\', '/', $class . '.php');
    //проверяем существование файла класса, если есть то подключаем
    if (file_exists($controllerName)) {
        require $controllerName;
    }
});

$router = Router::getInstance();
$router->run();