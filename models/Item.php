<?php

class Item {
    //Database properties
    private $conn;
    private $table = 'items';
    // Item properties
    public $id;
    public $name;
    public $price;
    public $properties;

    public function __construct($db){
        $this -> conn = $db;
    }

    // Get items method

    public function read(){
        $query = 'SELECT * from '. $this->table . 'ORDER BY id DESC';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute the query
        $stmt ->execute();
        return $stmt;
    }

}

?>