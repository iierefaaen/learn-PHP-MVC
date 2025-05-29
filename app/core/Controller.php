<?php

class Controller {
    public function view($view, $data = []){
        require_once("../app/views/admin/" . $view . ".php");
    }
    public function model( $model ) {
        require_once("../app/models/Student/" . $model . ".php");
        return new $model;
    }
    
    public function auth_view($view, $data = []){
        require_once("../app/views/auth/" . $view . ".php");
    }

    
    public function auth_model( $model ) {
        require_once("../app/models/Auth/" . $model . ".php");
        return new $model;
    }
    public function user_view($view, $data = []){
        require_once("../app/views/user/" . $view . ".php");
    }

    public function user_model( $model ) {
        require_once("../app/models/User/" . $model . ".php");
        return new $model;
    }
}