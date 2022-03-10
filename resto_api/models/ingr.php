<?php
 
    class Ingr {
        private $conn;
        private $table = 'ingredients';
        public $name;
        public $quantity;

        //constructor with db
        public function __construct($db){
            $this->conn = $db;
        }

        //get ingredients dispo du stock
        public function read(){
            $query = 'SELECT name , quantity FROM ' . $this->table ;
            
            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function create(){
            $query = 'INSERT INTO ' . 
            $this->table .
            ' SET 
            name = :name ,
            quantity = :quantity';

            $stmt = $this->conn->prepare($query);

            //clean data
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));

            //stmt bind 
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':quantity', $this->quantity);

            if($stmt->execute()){
                return true;
            }
                
            printf('Error');
            
            return false;

        }

        public function update(){
            $query = 'UPDATE ' . $this->table . 
            ' SET
                quantity = :quantity

              WHERE 
                name = :name ';
            
            $stmt = $this->conn->prepare($query);

            //clean data 
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));
            $this->name = htmlspecialchars(strip_tags($this->name));

            //bind data 
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':quantity', $this->quantity);

            if($stmt->execute()){
                return true;
            }
                
            printf('Error');
            
            return false;
        }
    }