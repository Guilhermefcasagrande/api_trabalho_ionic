<?php
    class Database{
        
        private $host = "localhost";
        private $dbName = "trabalho_ionic";
        private $user = "root";
        private $senha = "";

        public $conn;

        public function getConexao(){
            $this->conn = null;

            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->user, $this->senha);
                $this->conn->exec();
            }catch(PDOException $ex){
                echo "Erro na conexão: ".$exception->getMessage();
            }

            return $this->conn;
        }

    }

?>