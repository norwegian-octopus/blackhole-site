<?php

const ACCESS = true; //переменная, для ограничения прямого пути к конфигам

header('Content-type:text/html;charset=utf-8');
session_start();

define('ROOT', dirname(__FiLE__)); // определяем рут-путь

require_once ROOT . '\application\core\settings\autoloader.php'; // подключаем автолоадер
require_once ROOT . '\application\core\settings\sign_up_config.php'; // подключаем конфиги регистрации (regex)


// require_once (ROOT . '/application/core/Router.php');
use application\core\Router;
use application\core\Database;


Router::start();
