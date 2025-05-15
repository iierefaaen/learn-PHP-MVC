<?php

class Controller {
    public function view($view, $data = []){
        require_once("../app/views/admin/" . $view . ".php");
    }

    public function model( $model ) {
        require_once("../app/models/Student/" . $model . ".php");
        return new $model;
    }
}