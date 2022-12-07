<?php

class Controller
{

    public function model($model)
    {
        if (file_exists('../backApp/model/' . $model . '.php')) {

            require_once '../backApp/model/' . $model . '.php';
        }
        return new $model;
    }

    public function view($view, $data)
    {
        if (file_exists('../backApp/view/' . $view . '.php')) {
            require_once '../backApp/view/' . $view . '.php';
        }
    }
}
