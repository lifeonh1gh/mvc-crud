<?php

namespace application\controllers;

use application\classes\Controller;
use application\models\Users;

//include_once $_SERVER['DOCUMENT_ROOT'].'/process.php';

class MainController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Users();
    }

    public function IndexAction()
    {
        $this->view->render('Главная страница');
    }
}
