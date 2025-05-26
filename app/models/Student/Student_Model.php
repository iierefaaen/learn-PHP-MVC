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


    public function deleteStudentData($id)  {
        $this->db->query("UPDATE students SET deleted_at = NOW() WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->exec();
    }

    public function update_student($id, $data, $file, $img = null){
        // $ id = id, $data = $_POST, $file = $_FILES, $img = old image (if exist)    

        $foto = "";
        if ( $img === null ) {
            $foto = Functions::photo_handle_func($file);
            if ( $foto === null ){
                // die("Gagal upload gambar. Pastikan format valid (jpeg, jpeg, png), ukuran maksimal 2 MB.");
                return -1;
            }
        } else {
            $foto = $img;
        }

        // $id = $data["id"];

        $old_data = $this->getStudentByID($id);
        
        // Cek apakah ada perubahan
        if (
            $old_data['nama'] == $data["nama"] &&
            $old_data['nim'] == $data["nim"] &&
            $old_data['alamat'] == $data["alamat"] &&
            $old_data['kota'] == $data["kota"] &&
            $old_data['provinsi'] == $data["provinsi"] &&
            $old_data['telepon'] == $data["telepon"] &&
            $old_data['email'] == $data["email"] &&
            $old_data['jurusan'] == $data["jurusan"] &&
            $old_data['angkatan'] == $data["angkatan"] &&
            $old_data['jenis_kelamin'] == $data["jenis_kelamin"] &&
            $old_data['tanggal_lahir'] == $data["tanggal_lahir"] &&
            $old_data['jenjang'] == $data["jenjang"] &&
            $old_data['status'] == $data["status"] &&
            ( $old_data['foto'] == $foto )
            ) {
                return 0; // no changes
        }

        $this->db->query("
            UPDATE students SET
                nim = :nim,
                nama = :nama,
                alamat = :alamat,
                kota = :kota,
                provinsi = :provinsi,
                telepon = :telepon,
                email = :email,
                jurusan = :jurusan,
                angkatan = :angkatan,
                jenis_kelamin = :jenis_kelamin,
                tanggal_lahir = :tanggal_lahir,
                jenjang = :jenjang,
                foto = :foto,
                status = :status
            WHERE id = :id
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

        $ret = $this->db->exec();
        if ($ret >= 1) {
            return 1; // success update
        } else {
            return -1; // failed to update
        }
    }

}
