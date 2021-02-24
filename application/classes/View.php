<?php

namespace application\classes;

class View
{
    // путь к виду
    public $path;
    //
    public $route;
    // наш шаблон
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }
    // подключаем наш шаблон
    public function render($title, $vars = [])
    {
        extract($vars);
        // функция для того, чтобы не разделять на хедер и футер 
        ob_start();
        require 'application/views/' . $this->path . '.php';
        $content = ob_get_clean();
        require 'application/views/layouts/' . $this->layout . '.php';
    }

    public function redirect($url)
    {
        header('Location:'.$url);
        exit;
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        require 'application/views/errors/' . $code . '.php';
        exit();
    }
}
