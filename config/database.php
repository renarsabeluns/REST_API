<?php

class Database {
    //Database parameters
    private $host = 'localhost';
    private $db_name = 'restapi';
    private $username = 'root';
    private $password = '';
    private $conn;

    //Database connection method

    public function connect(){
        $this -> conn = null;

        try{
            $this -> conn = new PDO('mysql:host=' . $this->host . 'dbname=' . $this->db_name,
        $this->username, $this->password);

        $this -> conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $error){
            echo 'Connection Error'. $error ->getMessage();

        }
        return $this -> conn;
    }

}
?>