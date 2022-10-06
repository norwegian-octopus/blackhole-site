<?php

namespace application\user\models;

use application\core\Database;

class LoginModel
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

    public function isUserAdmin($email): Bool
    {
        $db = Database::getConnection();
        $query = $db->query("SELECT * FROM users WHERE EMAIL = ? AND ADMIN_STATUS = 1;");
        $query->execute([$email]);
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function validatePassword($email, $password): Bool
    {
        $db = Database::getConnection();
        // if (!$this->validateEmail($email)) return false;

        $query = $db->prepare("SELECT * FROM users WHERE EMAIL = ?;");
        $query->execute([$email]);
        $dbPassword = $query->fetch();
        if (!empty($dbPassword)) {
            $hashedPassword = $dbPassword['PASSWORD'];
            if (password_verify($password, $hashedPassword)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
