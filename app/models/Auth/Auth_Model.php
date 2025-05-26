<?php

class Auth_Model {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function check_login($email) {
        // $username = $_POST["username"];
        $query = "SELECT * FROM users  WHERE email = :email LIMIT 1";
        $this->db->query($query);
        $this->db->bind("email", $email);
        $result = $this->db->singleResult();
        if ( !$result ) return null;
        return $result;
    }

}