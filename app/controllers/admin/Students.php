<?php

class Students extends Controller {
    public function index() {
        $data["title"] = "Data Mahasiswa";

        $data["students"] = $this->model("Student_Model")->getAllStudents();

        $this->view("templates/header", $data);
        $this->view("Students/students", $data);
        $this->view("templates/footer");
    }

    public function detail($id){
        $data["title"] = "Detail Mahasiswa";

        $data["student"] = $this->model("Student_Model")->getStudentByID($id);

        $this->view("templates/header", $data);
        $this->view("Students/student_detail", $data);
        $this->view("templates/footer");
    }
    

    public function edit($id) {
        echo "EDIT";
    }
}