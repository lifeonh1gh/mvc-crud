<?php

namespace application\classes;

use application\classes\View;

class Router extends Singleton
{
    private $routes = []; //массив, в котором будут храниться маршруты
    private $controller = 'main';
    private $action = 'index';
    private $params = null;

    public function __construct()
    {
        //подключаем конфиг с маршрутами
        $arr = require 'application/config/routes.php';
        //перебираем массив и записываем в функцию add ключ значений route и params 
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    //добавление маршрута
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        //echo '<pre>'.$route.'</pre>';
        $this->routes[$route] = $params;
    }

    //проверка маршрута
    public function getURI()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $tmp_uri = explode('/', $url);

        if ((count($tmp_uri) == 2) and ($tmp_uri[1] != '')) {
            $this->controller = $tmp_uri[1];
        } elseif ((count($tmp_uri) == 2) and ($tmp_uri[1] == '')) {
            $this->controller = 'main';
        } elseif (count($tmp_uri) == 3) {
            $this->controller = $tmp_uri[1];
            $this->action = $tmp_uri[2];
        } elseif (count($tmp_uri) == 4) {
            $this->controller = $tmp_uri[1];
            $this->params = $tmp_uri[2];
            $this->action = $tmp_uri[3];
        } else {
            return false;
        }
        return true;
    }

    //запускаем роутер
    public function run()
    {
        if ($this->getURI()) {
            $controllerName = "application\controllers\\" . ucfirst($this->controller) . 'Controller';
            //require("application/controllers/{$controllerName}.php");
            if (class_exists($controllerName)) {
                $actionName =  ucfirst($this->action) . 'Action';
                if (method_exists($controllerName, $actionName)) {
                    $controller = new $controllerName([
                        'controller' => $this->controller,
                        'action' => $this->action,
                        'param' => $this->params
                    ]);
                    $controller->$actionName();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }



        /*
        //получаем строку запроса
        $uri = $this->getURI();
        //Получаем имя контроллера
        $controllerName = ucfirst(array_shift($tmp_uri)) . 'Controller';
        //Получаем имя экшена
        $actionName = 'action' . ucfirst(array_shift($tmp_uri));
        //Подключаем файл класса контроллера
        $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }
        //создаем объект и вызываем метод
        $params = $tmp_uri;
        $controllerObject = new $controllerName;
        $result = call_user_func_array(array($controllerObject, $actionName), $params);
        */
    }
}
