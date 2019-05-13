<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Cas{
        private $cas;
        private $rango;
        private $dias;
        private $tabla;

        public function __construct(){
            $this->cas = '';
            $this->rango = '';
            $this->dias = '';
            $this->tabla = 'cas';
        }

        public function create($cas, $rango, $dias){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->cas = $cas;
                $this->rango = $rango;
                $this->dias = $dias;
                $query = "INSERT INTO $this->tabla (cas, rango, dias, estado) VALUES ($this->cas, '$this->rango', $this->dias, true)";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }

        }

        public function read(){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT * FROM $this->tabla WHERE estado = true";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function getDatos($cod_cas){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT cas, rango, dias FROM $this->tabla WHERE cod_cas = $cod_cas";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function update($cas, $rango, $dias, $cod_cas){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->cas = $cas;
                $this->rango = $rango;
                $this->dias = $dias;
                $query = "UPDATE $this->tabla SET cas = $this->cas, rango = '$this->rango', dias = $this->dias WHERE cod_cas = $cod_cas";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
        public function delete($cod_cas){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "UPDATE $this->tabla SET estado = false WHERE cod_cas = $cod_cas";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

}
