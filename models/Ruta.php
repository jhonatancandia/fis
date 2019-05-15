<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Ruta{

        private $descripcion;
        private $fecha_ingreso;
        private $tabla;

        public function __construct(){
            $this->descripcion = '';
            $this->fecha_ingreso = '';
            $this->tabla = 'hoja_ruta';
        }

        public function create($descripcion, $fecha_ingreso){
            $conex = new Database();
            $conexion = $conex->connect(); 
            try {
               $this->descripcion = $descripcion;
               $this->fecha_ingreso = $fecha_ingreso;
               $query = "INSERT INTO $this->tabla (descripcion, estado, fecha_ingreso) VALUES ('$this->descripcion', true, '$this->fecha_ingreso')";
               return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
        
        public function read(){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query =  "SELECT hoja_ruta.cod_ruta, hoja_ruta.descripcion, hoja_ruta.fecha_ingreso, empleado.nombre, empleado.apellidos, cargo.cargo FROM hoja_ruta, empleado, empleado_hoja_ruta, cargo, empleado_cargo WHERE hoja_ruta.estado = true AND hoja_ruta.cod_ruta = empleado_hoja_ruta.cod_ruta AND empleado_hoja_ruta.ci = empleado.ci AND cargo.nro_item = empleado_cargo.nro_item AND empleado.ci = empleado_cargo.ci AND empleado.estado = true";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function getCodigo($descripcion, $fecha_ingreso){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT cod_ruta FROM $this->tabla WHERE descripcion = '$descripcion' AND fecha_ingreso = '$fecha_ingreso'";
                $res = $conexion->query($query)->fetchAll();
                foreach ($res as $cod) {
                    return $cod['cod_ruta'];
                }
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
        public function update($cod_ruta, $descripcion, $fecha_ingreso){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->cod_ruta = $cod_ruta;
                $this->descripcion = $descripcion;
                $this->fecha_ingreso = $fecha_ingreso;
                $query = "UPDATE $this->tabla SET 'descripcion = $this->descripcion', fecha_ingreso = $this->fecha_ingreso WHERE cod_ruta = $cod_ruta";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }

        }
        public function getDatos($cod_ruta){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT * FROM $this->tabla WHERE cod_ruta = $cod_ruta";
                return  $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function delete($cod_ruta){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "UPDATE $this->tabla SET estado = false WHERE cod_ruta = $cod_ruta";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

    }