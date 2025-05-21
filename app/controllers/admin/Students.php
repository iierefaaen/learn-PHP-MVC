<?php

require_once(__DIR__ . "/../../config/Functions.php");

class Students extends Controller {
    public function index() {
        if ( isset($_GET["title"]) && isset($_GET["message"]) && isset($_GET["type"]) ){
            Functions::print_alert_modal($_GET["title"], $_GET["message"], $_GET["type"]);
        }
        $data["title"] = "Data Mahasiswa";

        $data["students"] = $this->model("Student_Model")->getAllStudents();

        $this->view("templates/header", $data);
        $this->view("Students/students", $data);
        $this->view("templates/footer");
    }

    public function detail($id = null){
        $data["title"] = "Detail Mahasiswa";

        $data["student"] = $this->model("Student_Model")->getStudentByID($id);

        if ( $data["student"] == false || $id == null ){
            // if data not found, PDO return false
            $data["title"] = "404 - Data Tidak Ditemukan";
            $this->view("templates/header", $data);
            $this->view("Students/error");
            $this->view("templates/footer");
            exit;
        }

        $this->view("templates/header", $data);
        $this->view("Students/student_detail", $data);
        $this->view("templates/footer");
    }

    public function add(){
        if ( $_SERVER['REQUEST_METHOD'] === "POST" ){
            if ( isset($_POST["add"]) ){
                $result = $this->model("Student_Model")->add_student($_POST, $_FILES["photo"]);

                if ( $result === 1 ){
                    header("Location:" . BASE_URL . "students?title=Berhasil&message=Data Berhasil Ditambahkan&type=success");
                    exit;
                } else {
                    header("Location:" . BASE_URL . "students?title=Gagal&message=Data Gagal Ditambahkan&type=danger");
                    exit;
                }
            }
        }

        $data["title"] = "Tambah Data mahasiswa";

        $this->view("templates/header", $data);
        $this->view("Students/student_add");
        $this->view("templates/footer");
    }
    

    public function edit($id = null) {
        if ( $_SERVER['REQUEST_METHOD'] === "POST" ){
            if ( isset($_POST["edit"]) ){
                if ( $_FILES["photo"]["error"] === 4 ) {
                    $img = $this->model("Student_Model")->getStudentByID($id)["foto"];
                    $result = $this->model("Student_Model")->update_student($id, $_POST, null, $img);
                } else {
                    $result = $this->model("Student_Model")->update_student($id, $_POST, $_FILES["photo"], null);
                }


                if ( $result === 1 ){
                    header("Location:" . BASE_URL . "students?title=Berhasil&message=Data Berhasil Diperbarui&type=success");
                    exit;
                } else if ( $result === 0 ) {
                    header("Location:" . BASE_URL . "students?title=Peringatan&message=Tidak Ada Data Yang Diubah&type=warning");
                    exit;
                } else {
                    header("Location:" . BASE_URL . "students?title=Gagal&message=Data Gagal Diperbarui&type=danger");
                    exit;
                }
            }
        }

        $data["student"] = $this->model("Student_Model")->getStudentByID($id);

        if ( $data["student"] == false || $id == null){
            // if data not found, PDO return false
            $data["title"] = "404 - Data Tidak Ditemukan";
            $this->view("templates/header", $data);
            $this->view("Students/error");
            $this->view("templates/footer");
            exit;
        }



        $data["title"] = "Edit Data mahasiswa";

        $this->view("templates/header", $data);
        $this->view("Students/student_edit", $data);
        $this->view("templates/footer");
    }

    public function delete($id = null, $bool = null) {
        // @SOFT DELETE ONLY

        if ( $bool === "yes"){
            $result =  $this->model("Student_Model")->deleteStudentData($id);

                if ( $result === 1 ){
                    header("Location:" . BASE_URL . "students?title=Berhasil&message=Data Berhasil Dihapus&type=success");
                    exit;
                } else {
                    header("Location:" . BASE_URL . "students?title=Gagal&message=Data Gagal Dihapus&type=danger");
                    exit;
                }
        }

        $data["student"] = $this->model("Student_Model")->getStudentByID($id);

        if ( $data["student"] == false || $id == null ){
            // if data not found, PDO return false
            $data["title"] = "404 - Data Tidak Ditemukan";
            $this->view("templates/header", $data);
            $this->view("Students/error");
            $this->view("templates/footer");
            exit;
        }
        
        $data["title"] = "Hapus Data mahasiswa";
        $this->view("templates/header", $data);
        $this->view("Students/student_delete", $data);
        $this->view("templates/footer");
    }
}