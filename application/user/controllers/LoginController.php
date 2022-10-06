<?php

namespace application\user\controllers;

use application\user\models\LoginModel;

class LoginController
{

    private $model;
    // private $inputs = [];
    // private $errors = [];

    public function __construct()
    {
        $this->model = new LoginModel;
    }


    public function actionIndex()
    {

        // print_r($_SESSION);
        // print_r($_POST);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            list($errors, $inputs) = $this->validateForm();

            $this->validateForm();
            if ($errors) {
                
                $this->showForm($errors, $inputs);
            } else {
                
                $this->processForm($inputs);
            }
        } else {
            $this->showForm();
        }
    }

    public function showForm($errors = [], $input = [])
    {

        $fields = ['email', 'password'];
        foreach ($fields as $field) {
            if (!isset($errors[$field])) $errors[$field] = '';
            if (!isset($input[$field])) $input[$field] = '';
        }
        include_once ROOT . '/application/views/login.php';
    }


    public function validateForm()
    {

        $inputs = [];
        $errors = [];

        $inputs['email'] = htmlspecialchars(trim($_POST['email']));
        $inputs['password'] = htmlspecialchars(trim($_POST['password']));

        if (empty($inputs['email'])) {
            // return 'Введите электронный адрес';
            if (empty($inputs['password'])) {
                // return 'Введите пароль';
                $errors['email'] = 'Введите электронный адрес и пароль';
            }
        }

        if (!$this->model->validateEmail($inputs['email'])) {
            $errors['email'] = 'Неверный адрес';
        } elseif (!$this->model->validatePassword($inputs['email'], $inputs['password'])) {
            $errors['password'] = 'Неверный адрес или пароль';
        }



        return [$errors, $inputs];
    }

    public function processForm($inputs)
    {

        session_start();
        $_SESSION['valid_user'] = $inputs['email'];
        header('Location: /');
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION['valid_user']);
        header('Location: /');
    }
}
