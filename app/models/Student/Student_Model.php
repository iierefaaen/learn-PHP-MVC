<?php


class Student_Model {
    private $db_handler;
    private $stmt;

    public function __construct(){
        $dsn = "mysql:host=db;dbname=pabd";


        try {
            $this->db_handler = new PDO($dsn, "root", "rootpassword");
        } catch (PDOException $err) {
            die($err->getMessage());
        }

    }
    
    public function getAllStudents() {
        $this->stmt = $this->db_handler->prepare("SELECT * FROM students WHERE deleted_at IS NULL LIMIT 10");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
