<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Unidad{
        private $nombre_unidad;
        private $direccion;
        private $telefono;
        private $tabla;

        public function __construct(){
            $this->nombre_unidad = '';
            $this->direccion = '';
            $this->telefono = '';
            $this->tabla = 'unidad';
        }

        public function create($nombre_unidad, $direccion, $telefono){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->nombre_unidad = $nombre_unidad;
                $this->direccion = $direccion;
                $this->telefono = $telefono;
                $query = "INSERT INTO $this->tabla (nombre_unidad, direccion, telefono, estado) VALUES ('$this->nombre_unidad', '$this->direccion', '$this->telefono', true)";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function read(){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT cod_unidad, nombre_unidad, direccion, telefono FROM $this->tabla WHERE estado = true";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function update($nombre_unidad, $direccion, $telefono, $cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->nombre_unidad = $nombre_unidad;
                $this->direccion = $direccion;
                $this->telefono = $telefono;
                $query = "UPDATE $this->tabla SET nombre_unidad = '$this->nombre_unidad', direccion = '$this->direccion', telefono = '$this->telefono' WHERE cod_unidad = $cod";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function getDatos($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT cod_unidad, nombre_unidad, direccion, telefono FROM $this->tabla WHERE cod_unidad = $cod";
                return  $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function delete($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "UPDATE $this->tabla SET estado = false WHERE cod_unidad = $cod";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
    }
