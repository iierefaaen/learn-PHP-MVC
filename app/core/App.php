<?php

class App {
    protected $controller = "Dashboard";
    protected $method = "index";
    protected $params = [];

    protected $adminControllerPath = "../app/controllers/admin/";
    protected $authControllerPath = "../app/controllers/Auth/Auth.php";

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $url = $this->parseURL();

        if (!$this->isLoggedIn()) {
            $this->runAuth("login");
            return;
        }

        if ($this->isLogoutRequest($url)) {
            $this->runAuth("logout");
            return;
        }

        $this->handleController($url);
        $this->handleMethod($url);
        $this->handleParams($url);

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL() {
        if (isset($_GET["url"])) {
            $url = trim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode("/", $url);
        }
        return ["home", "index"];
    }

    private function isLoggedIn() {
        return isset($_SESSION["login"]) && $_SESSION["login"] === "LOGIN";
    }

    private function isLogoutRequest($url) {
        return isset($url[0], $url[1]) && $url[0] === "auth" && $url[1] === "logout";
    }

    private function runAuth($method) {
        require_once $this->authControllerPath;
        $controller = new Auth();
        call_user_func([$controller, $method]);
        exit;
    }

    private function handleController(&$url) {
        $controllerName = ucfirst($url[0] ?? $this->controller);
        $controllerFile = $this->adminControllerPath . $controllerName . ".php";

        if (file_exists($controllerFile)) {
            $this->controller = $controllerName;
            unset($url[0]);
        }

        require_once $this->adminControllerPath . $this->controller . ".php";
        $this->controller = new $this->controller;
    }

    private function handleMethod(&$url) {
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
    }

    private function handleParams($url) {
        $this->params = array_values($url);
    }
}
