<?php

namespace application\controllers;

use application\classes\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $this->view->render('Вход');
    }

    public function signupAction()
    {
        $this->view->render('Регистрация');
    }

    public function logoutAction()
    {
        $this->view->render('Выход');
    }
}
