<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Cargo{
        private $nro_item;
        private $cargo;
        private $tipo_cargo;
        private $tabla;

        public function __construct(){
            $this->nro_item = '';
            $this->cargo = '';
            $this->tipo_cargo = '';
            $this->tabla = 'cargo';
        }

        public function create($nro_item, $cargo, $tipo_cargo){
            $conex = new Database();
            $conexion = $conex->connect(); 
            try {
               $this->nro_item = $nro_item;
               $this->cargo = $cargo;
               $this->tipo_cargo = $tipo_cargo;
               $query = "INSERT INTO $this->tabla (nro_item, cargo, estado, cargo_tipo_cargo) VALUES ($this->nro_item, '$this->cargo', true, $this->tipo_cargo)";
               return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function read(){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT c.nro_item, c.cargo, tc.tipo_cargo FROM $this->tabla c, tipo_cargo tc WHERE c.estado = true AND c.cargo_tipo_cargo = tc.cod_tipo_cargo";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function update($nro_item, $cargo, $cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->nro_item = $nro_item;
                $this->cargo = $cargo;
                $query = "UPDATE $this->tabla SET nro_item = $this->nro_item, cargo = '$this->cargo' WHERE nro_item = $cod ";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }

        }

        public function getDatos($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT nro_item, cargo FROM $this->tabla WHERE nro_item = $cod";
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