<?php

namespace application\models;

use application\classes\Model;

class Users extends Model
{
    private string $dataPath;

    public function __construct()
    {
        parent::__construct();
        $this->dataPath = $_SERVER['DOCUMENT_ROOT']."/data";
        $this->userData = glob($this->dataPath."/*.json");
    }

    public function getUsers()
    {
        $users = array();
        foreach (glob($this->dataPath."/*.json") as $fileUserData)
        {
            $user = json_decode(file_get_contents($fileUserData), true);
            $users[$user['id']] = $user;
        }
        return $users;
    }

    public function getUserByid(string $id)
    {
        try {
            $user = json_decode(file_get_contents($this->dataPath . '/' . $id . '.json'), true);
            if ($user) {
                return $user;
            }
        } catch (\Exception $ex) {
            die("Файл " . $this->dataPath . "/$id.json не найден<br>" . $ex);
        }
        return false;
    }

    public function createUser($data)
    {
        if (file_put_contents($this->dataPath.'/'.$data['id'].'.json', json_encode($data)))
        {
            return true;
        }
        return false;
    }

    public function updateUser($data)
    {
        $user = $this->getUserByid($data['id']);
        if ($user){
            $this->deleteUser($data['id']);
            file_put_contents($this->dataPath.'/'.$user['id'].'.json', json_encode($data));
            return $user['id'];
        } else {
            return false;
        }
    }

    public function deleteUser(string $id)
    {
        $user = $this->getUserByid($id);
        $file = $this->dataPath.'/'.$id.'.json';
            if ($user['id'] == $id) {
                unlink($file);
            }
    }

    

    public function validateUser($user, $errors)
    {
        $isValid = true;
        // Процесс валидации
        if (!$user['name']) {
            $isValid = false;
            $errors['name'] = 'Укажите пожалуйста имя';
        }
        if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $errors['email'] = 'Неверный формат электронной почты';
        }
        if (!$user['password']) {
            $isValid = false;
            $errors['password'] = 'Укажите пожалуйста пароль';
        }
        return $isValid;
    }
}
