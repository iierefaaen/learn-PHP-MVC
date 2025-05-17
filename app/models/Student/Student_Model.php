<?php
require_once(__DIR__ . "/../../config/Functions.php");

class Student_Model {

    private $table = "students";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllStudents(){
        $this->db->query("SELECT * FROM " . $this->table . " WHERE deleted_at IS NULL LIMIT 15");
        return $this->db->resultSet();
    }

    public function getStudentByID($id) {
        $this->db->query("SELECT * FROM " . $this->table . ' WHERE id=:id AND deleted_at IS NULL');
        $this->db->bind("id", $id);
        return $this->db->singleResult();
    }

    public function add_student($data, $file){
        $id= uniqid("mhs_");
        $nim = $data["nim"];
        $nama = $data["nama"];
        $alamat = $data["alamat"];
        $kota = $data["kota"];
        $provinsi = $data["provinsi"];
        $telepon = $data["telepon"];
        $email = $data["email"];
        $jurusan = $data["jurusan"];
        $angkatan = $data["angkatan"];
        $jenis_kelamin = $data["jenis_kelamin"];
        $tanggal_lahir = $data["tanggal_lahir"];
        $jenjang = $data["jenjang"];
        $status = $data["status"];

        $foto = Functions::photo_handle_func($file);
        
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
        $this->db->bind("nim", $nim);
        $this->db->bind("nama", $nama);
        $this->db->bind("alamat", $alamat);
        $this->db->bind("kota", $kota);
        $this->db->bind("provinsi", $provinsi);
        $this->db->bind("telepon", $telepon);
        $this->db->bind("email", $email);
        $this->db->bind("jurusan", $jurusan);
        $this->db->bind("angkatan", $angkatan);
        $this->db->bind("jenis_kelamin", $jenis_kelamin);
        $this->db->bind("tanggal_lahir", $tanggal_lahir);
        $this->db->bind("jenjang", $jenjang);
        $this->db->bind("foto", $foto);
        $this->db->bind("status", $status);

        // TODO: FIX BELOW
        $result = $this->db->exec();
        if ( $result > 0 ){
            echo "BERHASIL";
        } else if ( $result === 0 ){
            echo "00000";
        } else {
            echo "ELSE";
        }
    }
}
