<?php

class App {
    protected $controller = "Dashboard";
    protected $method = "index";
    protected $params = [];
    public function __construct() {

        if ( session_status() === PHP_SESSION_NONE ) session_start();
        if ( !isset($_SESSION["login"]) || $_SESSION["login"] !== "LOGIN" ) {
            // header("Location : " . BASE_URL . "auth/login");
            $this->controller = "auth";
            $this->method = "login";

            require_once("../app/controllers/Auth/Auth.php");
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller, $this->method], $this->params);
            exit;
        }
        
        
        
        $url = $this->parse_URL();


        if ( $url[0] === "auth" && $url[1] === "logout") {
            $this->controller = "auth";
            $this->method = "logout";

            require_once("../app/controllers/Auth/Auth.php");
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller, $this->method], $this->params);
            exit;
        }

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


        // TODO
        // if ( !$this->isLogedIn() ){
        //     $this->controller = "auth";
        //     $this->method = "login";
            
        //     require_once("../app/controllers/Auth/Auth.php");
        //     $this->controller = new $this->controller;
        //     // call_user_func_array([$this->controller, $this->method], $this->params);
        //     // exit;
        // }
        // : TODO


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

    // TODO :
    public function isLogedIn() {
        if ( !isset($_SESSION["login"]) ) {
            // header("Location: http://localhost:8080/auth/login");
            // exit;
            // $this->controller = "auth";
            // $this->method = "login";
            return false;
        }
        return true;

    }
}