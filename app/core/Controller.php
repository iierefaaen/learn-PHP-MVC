<?php

class Controller {
    public function view($view, $data = []){
        require_once("../app/views/admin/" . $view . ".php");
    }
}