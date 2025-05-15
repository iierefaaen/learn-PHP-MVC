<?php

class Students extends Controller {
    public function index() {
        $data["title"] = "Data Mahasiswa";

        $data["students"] = $this->model("Student_Model")->getAllStudents();

        $this->view("templates/header", $data);
        $this->view("Students/students", $data);
        $this->view("templates/footer");
    }
}