<?php

class Dashboard extends Controller {
    public function index() {
        $this->user_view("templates/header");
        $this->user_view("home");
        $this->user_view("templates/footer");
    }

}