<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Beneficio{
        private $tipo_beneficio;
        private $descripcion;
        private $tabla;

        public function __construct(){
            $this->tipo_beneficio = '';
            $this->descripcion = '';
            $this->tabla = 'beneficio';
        }

        public function create($tipo_beneficio, $descripcion){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->tipo_beneficio = $tipo_beneficio;
                $this->descripcion = $descripcion;
                    $query = "INSERT INTO $this->tabla (tipo_beneficio, descripcion, estado) VALUES ('$this->tipo_beneficio','$this->descripcion', true)";
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

        public function getDatos($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT * FROM $this->tabla WHERE cod_beneficio = $cod";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function update($tipo_beneficio, $descripcion, $cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->tipo_beneficio = $tipo_beneficio;
                $this->descripcion = $descripcion;
                $query = "UPDATE $this->tabla SET tipo_beneficio = '$this->tipo_beneficio', descripcion = '$this->descripcion' WHERE cod_beneficio = $cod";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
        public function delete($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "UPDATE $this->tabla SET estado = false WHERE cod_beneficio = $cod";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
    }
