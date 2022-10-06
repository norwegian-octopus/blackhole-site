<?php


namespace application\core;

class Database
{

    public static function getConnection()
    {

        require_once ROOT . '\application\core\settings\db_config.php';
        $dsn = "mysql:host=" . HOST . "; dbname=" . DB_NAME . ";";
        $options = [\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
        $db = new \PDO($dsn, USER, PASS, $options);

        return $db;
    }
}
