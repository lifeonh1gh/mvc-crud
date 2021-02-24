<?php

namespace application\controllers;

use application\classes\Controller;
use application\models\Users;

class UsersController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Users();
    }

    public function FormAction()
    {
        $this->view->render('Пользователи', [
            'users' => $this->model->getUsers($this->route['param'])
        ]);
    }

    public function CreateAction()
    {
        if (isset($_POST['submit'])) {
            $userData = array(
                'id' => uniqid(),
                'name' => $_POST['name'],
                'password' => $_POST['password'],
                'email' => $_POST['email']
            );
                $this->model->createUser($userData);
                $this->view->redirect("/users/form");
        } else {
            $this->view->render('Создать пользователя');
        }
    }

    public function EditAction()
    {

        $userId = $this->route['param'];
        $user = $this->model->getUserByid($userId);
        if (!$user){
            $this->view->render('Редактировать пользователя', [
                'errorFind' => "Нет пользователя с ID: " . $userId
            ]);
        } else {
            if (isset($_POST['submit'])) {
                $userData = array(
                    'id' => $userId,
                    'name' => $_POST['name'],
                    'password' => $_POST['password'],
                    'email' => $_POST['email']
                );
                $this->model->updateUser($userData);
                $this->view->redirect("/users/form");
            } else {
                $this->view->render('Редактировать пользователя', [
                    'user' => $user
                ]);
            }
        }
    }

    public function ViewAction()
    {
        $userId = $this->route['param'];
        $user = $this->model->getUserByid($userId);
        if (isset($user)) {
            $this->view->render('Профиль: ' . $userId, [
                'user' => $this->model->getUserByid($this->route['param'])
            ]);
        }
    }

    public function DeleteAction()
    {
        $userId = $this->route['param'];
        $user = $this->model->getUserByid($userId);

        if (isset($user)) {
            if (isset($_POST['submit'])) {
                $this->model->deleteUser($userId);
                $this->view->redirect("/users/form");
            } else {
                $this->view->render('Удалить пользователя', [
                    'user' => $user
                ]);
            }
        } else {
            $this->view->render('Удалить пользователя', [
                'errorFind' => "Пользователь не найден"
            ]);
        }
    }


}
