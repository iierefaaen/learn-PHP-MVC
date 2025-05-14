<?php

class App {
    protected $controller = "Dashboard";
    protected $method = "index";
    protected $params = [];
    public function __construct() {
        $url = $this->parse_URL();

        // controllers
        if ( file_exists("../app/controllers/admin/" . ucfirst($url[0]) . ".php")){
            //
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }
        require_once "../app/controllers/admin/" . ucfirst($this->controller) . ".php";
        $this->controller = new $this->controller;

        // method
        if ( isset($url[1]) ){
            if ( method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // parameter
        if ( !empty($url) ){
            $this->params = array_values($url);
        }


        // jalankan controller, method, kirim params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parse_URL(){
        if ( isset($_GET["url"]) ) {
            // remove / in strat and end with trim()
            $url = trim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        } else {
            return ["home", "index"];
        }
        
    }
}