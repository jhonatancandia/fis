<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';
    
    class Cargo_tipo{
        private $tipo_cargo;
        private $tabla;

        public function __construct(){
            $this->tabla = 'tipo_cargo';
        }

        public function read(){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT * FROM $this->tabla";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
    }