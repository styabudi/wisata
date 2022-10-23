<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
    public function helper($helper)
    {
        require_once '../app/helpers/'.$helper.'.php';
        return new $helper;
    }
}
