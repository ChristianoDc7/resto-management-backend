<?php 
 class Database {
     //DB params
     private $host = 'localhost';
     private $db_name = 'resto';
     private $username = 'root';
     private $password = '';
   
     private $conn;

     public function connect(){
        $this->conn = null;

        try{
            
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        }catch(PDOException $e){
            echo 'Connecion error :' . $e->getMessage();
        }
        return $this->conn;
     }

 }