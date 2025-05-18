<?php
require_once(__DIR__ . "/../../config/Functions.php");

class Student_Model {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllStudents(){
        $this->db->query("SELECT * FROM students WHERE deleted_at IS NULL");
        return $this->db->resultSet();
    }

    public function getStudentByID($id) {
        $this->db->query("SELECT * FROM students WHERE id=:id AND deleted_at IS NULL");
        $this->db->bind("id", $id);
        return $this->db->singleResult();
    }

    public function add_student($data, $file){
        $id= uniqid("mhs_");
        // $nim = $data["nim"];
        // $nama = $data["nama"];
        // $alamat = $data["alamat"];
        // $kota = $data["kota"];
        // $provinsi = $data["provinsi"];
        // $telepon = $data["telepon"];
        // $email = $data["email"];
        // $jurusan = $data["jurusan"];
        // $angkatan = $data["angkatan"];
        // $jenis_kelamin = $data["jenis_kelamin"];
        // $tanggal_lahir = $data["tanggal_lahir"];
        // $jenjang = $data["jenjang"];
        // $status = $data["status"];

        $foto = Functions::photo_handle_func($file);
        if ( $foto === null ){
            // die("Gagal upload gambar. Pastikan format valid (jpeg, jpeg, png), ukuran maksimal 2 MB.");
            return 0;
        }
        
        $this->db->query("
        INSERT INTO students
        ( id, nim, nama,
        alamat, kota, provinsi,
        telepon, email,
        jurusan, angkatan,
        jenis_kelamin, tanggal_lahir,
        jenjang, foto, status )
        VALUES ( :id, :nim, :nama, :alamat, :kota, :provinsi, :telepon, :email, :jurusan, :angkatan, :jenis_kelamin, :tanggal_lahir, :jenjang, :foto, :status )
        ");

        $this->db->bind("id", $id);
        $this->db->bind("nim", $data["nim"]);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("alamat", $data["alamat"]);
        $this->db->bind("kota", $data["kota"]);
        $this->db->bind("provinsi", $data["provinsi"]);
        $this->db->bind("telepon", $data["telepon"]);
        $this->db->bind("email", $data["email"]);
        $this->db->bind("jurusan", $data["jurusan"]);
        $this->db->bind("angkatan", $data["angkatan"]);
        $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
        $this->db->bind("tanggal_lahir", $data["tanggal_lahir"]);
        $this->db->bind("jenjang", $data["jenjang"]);
        $this->db->bind("foto", $foto);
        $this->db->bind("status", $data["status"]);

        return $this->db->exec();
    }


    public function deleteStudentData($id) : int {
        $this->db->query("UPDATE students SET deleted_at = NOW() WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->exec();
    }
}
