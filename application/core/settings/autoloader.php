<?php

ACCESS or die('Access denied');

/**
 * Автолоадер пока отключен, так как проблема с namespace и роутингом из-за этого. 
 * Нужен другой роутер или найти проблему в строке с созданием класса: $controller = new $controller_name;
 * 
 */

use application\exceptions\RouteException;

// автолоадер классов
function autoloadMainClasses($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    if(!@include_once $class_name . '.php') {
        throw new RouteException('Неверное имя файла для подключения - ' . $class_name . '.php');
    }
    
    include_once $class_name . '.php';
}

spl_autoload_register('autoloadMainClasses');

