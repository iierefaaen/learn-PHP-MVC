<?php

class App {
    public function __construct() {
        echo "__construct";
        echo "<br><br>";
        $url = $this->parse_URL();
        var_dump($url);
    }

    public function parse_URL(){
        if ( isset($_GET["url"]) ) {
            // remove / in strat and end with trim()
            $url = trim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}