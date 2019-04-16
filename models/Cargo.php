<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Cargo{
        private $nro_item;
        private $tipo_cargo;
        private $tabla;

        public function __construct(){
            $this->nro_item = '';
            $this->tipo_cargo = '';
            $this->tabla = 'cargo';
        }

        public function create($nro_item, $tipo_cargo){
            $conex = new Database();
            $conexion = $conex->connect(); 
           try {
               $this->nro_item = $nro_item;
               $this->tipo_cargo = $tipo_cargo;
               $query = "INSERT INTO $this->tabla (nro_item, tipo_cargo, estado) VALUES ($this->nro_item, '$this->tipo_cargo', true)";
               return $conexion->prepare($query)->execute();
           } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
           }
        }

        public function read(){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT nro_item, tipo_cargo FROM $this->tabla WHERE estado = true";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function update($nro_item, $tipo_cargo, $cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->nro_item = $nro_item;
                $this->tipo_cargo = $tipo_cargo;
                $query = "UPDATE $this->tabla SET nro_item = $this->nro_item, tipo_cargo = '$this->tipo_cargo' WHERE nro_item = $cod ";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }

        }

        public function getDatos($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT nro_item, tipo_cargo FROM $this->tabla WHERE nro_item = $cod";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e){
                exit("Error: ".$e->getMessage());
            }
        }

        public function delete($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try{
                $query = "UPDATE $this->tabla SET estado = false WHERE nro_item = $cod";
                return $conexion->prepare($query)->execute();
            } catch(PDOException $e){
                exit ("Error: ".$e->getMessage());
            }
        }
    }