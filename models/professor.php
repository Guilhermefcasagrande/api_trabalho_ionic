<?php

class Professor{
    private $conn;
    private $table = "professor";

    public $id;
    public $nome;
    public $dt_nascimento;
    public $foto_url;
    public $curriculo;
    public $status;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getProfessor(){
        $query = "SELECT * FROM " . $this->table . " ORDER BY id";
 
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

}

?>