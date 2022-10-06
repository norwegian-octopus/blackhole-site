<?php

namespace application\user\models;

use application\core\Database;

class SignUpModel
{

    public function validateEmail($email): Bool
    {
        $db = Database::getConnection();
        $query = $db->prepare("SELECT * FROM users WHERE EMAIL = ?;");
        $query->execute([$email]);
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function validateLogin($login): Bool
    {
        $db = Database::getConnection();
        $query = $db->prepare("SELECT * FROM users WHERE LOGIN = ?;");
        $query->execute([$login]);
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertUserData($inputs): void
    {
        $db = Database::getConnection();
        $query = $db->prepare("INSERT INTO users (LOGIN, NAME, SURNAME, BIRTHDATE, EMAIL, PASSWORD)
        VALUES (:login, :name, :surname, :birthdate, :email, :password1);");
        $query->bindValue(':login', $inputs['login'], \PDO::PARAM_STR);
        $query->bindValue(':name', $inputs['name'], \PDO::PARAM_STR);
        $query->bindValue(':surname', $inputs['surname'], \PDO::PARAM_STR);
        $query->bindValue(':birthdate', $inputs['birthdate'], \PDO::PARAM_STR);
        $query->bindValue(':email', $inputs['email'], \PDO::PARAM_STR);
        $query->bindValue(':password1', $inputs['password1'], \PDO::PARAM_STR);
        // $query->execute([$inputs['login'], $inputs['name'], $inputs['surname'], $inputs['email'], $inputs['password1']]);
        $query->execute();
    }
}
