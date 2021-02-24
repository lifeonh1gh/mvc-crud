<?php

namespace application\classes;

abstract class Controller
{
    public $route;
    public $view;
    public Model $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
    }
}
