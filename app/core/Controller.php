<?php

class Controller {
    public function view($view, $data = [])
    {
        require_once dirname(__DIR__) . '/views/' . $view . '.php';
    }

    public function model($model) {
        $file_path = dirname(__DIR__) . '/models/' . $model . '.php';
        
        if (file_exists($file_path)) {
            require_once $file_path;
            return new $model;
        } else {
            die("Error: Model file <b>$model.php</b> tidak ditemukan di folder app/models/!");
        }
    }
}
