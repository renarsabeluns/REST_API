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
        $query = 'SELECT * from '. $this->table;

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute the query
        $stmt ->execute();
        return $stmt;
    }

    // Create post

    public function create(){
        $query = 'INSERT INTO ' .$this->table . 
        ' SET 
        name = :name,
        price = :price,
        properties = :properties ';

         //Prepare statement
        $stmt = $this->conn->prepare($query);

         //Clean data
         $this->name = htmlspecialchars(strip_tags($this->name));
         $this->price = htmlspecialchars(strip_tags($this->price));
         $this->properties = htmlspecialchars(strip_tags($this->properties));

        //Bind data
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':price',$this->price);
        $stmt->bindParam(':properties',$this->properties);

        if($stmt->execute()){
            return true;
        } 
        printf("Error %s. \n,$stmt->error");
        return false;
    }

    public function update(){
        $query = 'UPDATE ' .$this->table . 
        ' SET 
        name = :name,
        price = :price,
        properties = :properties 
        
        WHERE id = :id';

         //Prepare statement
        $stmt = $this->conn->prepare($query);

         //Clean data
         $this->name = htmlspecialchars(strip_tags($this->name));
         $this->price = htmlspecialchars(strip_tags($this->price));
         $this->properties = htmlspecialchars(strip_tags($this->properties));
         $this->id = htmlspecialchars(strip_tags($this->id));

        //Bind data
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':price',$this->price);
        $stmt->bindParam(':properties',$this->properties);
        $stmt->bindParam(':id',$this->id);


        if($stmt->execute()){
            return true;
        } 
        printf("Error %s. \n,$stmt->error");
        return false;
    }

    public function delete(){

        $query = 'DELETE FROM ' .$this->table .' WHERE id = :id';

        $stmt = $this->conn->prepare($query);
        //Clean ID
        $this->id = htmlspecialchars(strip_tags($this->id));
        //Bind ID
        $stmt->bindParam(':id',$this->id);
        //Execute the query
        if($stmt->execute()){
            return true;
        } 
        // Print an error if something goes wrong
        printf("Error %s. \n,$stmt->error");
        return false;

    }

}

?>