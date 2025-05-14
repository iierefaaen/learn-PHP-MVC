<?php


class Dashboard extends Controller {
    public function index() {
        $data["title"] = "Admin - Dashboard";
        $data["jumlah_dosen"] = 99999999;
        $data["jumlah_mahasiswa"] = 999999999999;
        $data["jumlah_mata_kuliah"] = 99999999999999;

        $this->view("templates/header", $data);
        $this->view("Dashboard/dashboard", $data);
        $this->view("templates/footer", $data);
    }
}