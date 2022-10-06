<?php

namespace application\user\controllers;

class error404Controller {

    public function actionIndex() {
        include_once ROOT . '/application/views/error404.php';
        
    }
    
}