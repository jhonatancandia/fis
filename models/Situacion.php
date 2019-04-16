<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'fiscalia/config/Database.php';

    class Situacion{
        private $tipo_situacion;
        private $descripcion;
        private $tabla;

        public function __construct(){
            $this->tipo_situacion = '';
            $this->descripcion = '';
            $this->tabla = 'situacion';
        }

        public function create($tipo_situacion, $descripcion){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->tipo_situacion = $tipo_situacion;
                $this->descripcion = $descripcion;
                $query = "INSERT INTO $this->tabla (tipo_situacion, descripcion, estado) VALUES ('$this->tipo_situacion', '$this->descripcion', true)";
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
                $query = "SELECT * FROM $this->tabla WHERE cod_situacion = $cod";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function update($situacion, $descripcion, $cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->tipo_situacion = $situacion;
                $this->descripcion = $descripcion;
                $query = "UPDATE $this->tabla SET tipo_situacion = '$this->tipo_situacion', descripcion = '$this->descripcion' WHERE cod_situacion = $cod";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function delete($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "UPDATE $this->tabla SET estado = false WHERE cod_situacion = $cod";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
    }
