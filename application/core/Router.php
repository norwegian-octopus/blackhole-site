<?php

namespace application\core;

class Router {
    
    // public static function test() {
    //     echo '<h1>next</h1>';
    // }

    public static function start() {
        
        
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'Index';


        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // print_r($routes);

        // получаем имя контроллера
        if (!empty($routes[1])) $controller_name = $routes[1];
        
        // получаем имя экшена
        if (!empty($routes[2])) $action_name = $routes[2];

        // создаем строки идентичные названиям файлов контроллер, моделей и методов контроллеров (action_name)
        $model_name = $controller_name . 'Model';
        $controller_name = $controller_name . 'Controller';
        $action_name = 'action' . $action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)
        // $model_file = $model_name . '.php';
        // $model_path = "/application/user/models/" . $model_file;
        // if (file_exists($model_path)) {
        //     include ROOT . "/application/user/models/" . $model_file;
        // } 
        // // КОММЕНТАРИЙ
        // else {
        //     echo 'Model is not found.';
        // }
        
        


        // подцепляем файл с классом контроллера
        // $controller_file = strtolower($controller_name)  . '.php';
        $controller_file = $controller_name  . '.php';
        $controller_path = ROOT . "/application/user/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            // echo " $controller_file is found! - $controller_path";
            include_once ROOT . "/application/user/controllers/" . $controller_file;
        } else {
            /*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
            Router::ErrorPage404();
        }

        

        // создаем контроллер
        
        $class_name = 'application\user\controllers\\' . $controller_name; // наименование согласно namespace
        $controller = new $class_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            // возможно, потом сделать обработку исключения
            // echo 'no action';
            Router::ErrorPage404();
        }
    }

    static function ErrorPage404()
    {   
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . 'Error404');
    }
}