<?php

namespace application\user\controllers;

use application\user\models\SignUpModel;

class SignUpController
{

    private $model;
    // private $inputs = [];
    // private $errors = [];

    public function __construct()
    {
        $this->model = new SignUpModel;
    }


    public function actionIndex(): void
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

    public function showForm($errors = [], $input = []): void
    {

        $fields = ['login', 'name', 'surname', 'birthdate', 'email', 'password1', 'password2'];
        foreach ($fields as $field) {
            if (!isset($errors[$field])) $errors[$field] = '';
            if (!isset($input[$field])) $input[$field] = '';
        }
        include_once ROOT . '/application/views/signup.php';
    }


    public function validateForm(): array
    {

        $inputs = [];
        $errors = [];

        $inputs['login'] = htmlspecialchars(trim($_POST['login']));
        $inputs['name'] = htmlspecialchars(trim($_POST['name']));
        $inputs['surname'] = htmlspecialchars(trim($_POST['surname']));
        $inputs['birthdate'] = htmlspecialchars(trim($_POST['email']));
        $inputs['email'] = htmlspecialchars(trim($_POST['email']));
        $inputs['password1'] = htmlspecialchars(trim($_POST['password1']));
        $inputs['password2'] = htmlspecialchars(trim($_POST['password2']));

        $regexStr = SIGNUP_STR;
        $regexEmail = SIGNUP_EMAIL;
        $regexPassword = SIGNUP_PASS;

        if (empty($inputs['login'])) {
            $errors['login'] = 'Введите логин';
        } elseif (!preg_match($regexStr, $inputs['login'])) {
            $errors['login'] = "Только буквы, цифры и символы ('_','-')";
        }
        if (empty($inputs['name'])) {
            $errors['name'] = 'Введите имя';
        } elseif (!preg_match($regexStr, $inputs['name'])) {
            $errors['name'] = "Только буквы, цифры и символы ('_','-')";
        }
        if (empty($inputs['surname'])) {
            $errors['surname'] = 'Введите фамилию';
        } elseif (!preg_match($regexStr, $inputs['surname'])) {
            $errors['surname'] = "Только буквы, цифры и символы ('_','-')";
        }
        if (empty($inputs['birthdate'])) {
            $errors['email'] = 'Укажите дату рождения';
        }
        if (empty($inputs['email'])) {
            $errors['email'] = 'Введите электронный адрес';
        } elseif (!preg_match($regexEmail, $inputs['email'])) {
            $errors['email'] = "Неверно указан адрес (пример: email@email.com)";
        }
        if (empty($inputs['password1'])) {
            $errors['password1'] = 'Введите пароль';
        } elseif (!preg_match($regexPassword, $inputs['password1'])) {
            $errors['password1'] = "Слишком простой пароль";
        }
        if (empty($inputs['password2'])) {
            $errors['password2'] = 'Введите повторно пароль';
        } elseif ($inputs['password2'] !== $inputs['password1']) {
            $errors['password2'] = 'Пароль не совпадает';
        }
        

        if ($this->model->validateEmail($inputs['email'])) {
            $errors['email'] = 'Адрес уже используется';
        }
        if ($this->model->validateLogin($inputs['login'])) {
            $errors['login'] = 'Логин уже используется';
        }

        // $inputs['birthdate'] = date_create_from_format('Y-m-d', $inputs['birthdate'] );

        return [$errors, $inputs];
    }

    public function processForm($inputs): void
    {
        $inputs['password1'] = password_hash($inputs['password1'], PASSWORD_DEFAULT);
        $this->model->insertUserData($inputs);
        

        session_start();
        $_SESSION['valid_user'] = $inputs['email'];
        header('Location: /');
    }

    public function actionLogout(): void
    {
        session_start();
        unset($_SESSION['valid_user']);
        header('Location: /');
    }
}
