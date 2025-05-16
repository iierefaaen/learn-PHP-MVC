<?php

class Database {
    private $host = DB_HOST;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $db_name = DB_NAME;


    private $db_handler;
    private $stmt;

    public function __construct(){
        $dsn = "mysql:host=$this->host;dbname=$this->db_name";

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->db_handler = new PDO($dsn, $this->username, $this->password, $option);
        } catch (PDOException $err) {
            die($err->getMessage());
        }

    }


    public function query($query) {
        $this->stmt = $this->db_handler->prepare($query);
    }

    public function bind($param, $val, $type = null) {
        if ( is_null($type) ){
            switch ( true ){
                case ( is_int($val) ) :
                    $type = PDO::PARAM_INT;
                    break;
                case ( is_bool($val) ):
                    $type = PDO::PARAM_BOOL;
                    break;
                case ( is_null($val) ):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $val, $type);
    }


    public function exec() {
        $this->stmt->execute();
    }

    public function resultSet() {
        $this->exec();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function singleResult() {
        $this->exec();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

}