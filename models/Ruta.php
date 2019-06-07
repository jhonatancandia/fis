<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Ruta{

        private $num_ruta;
        private $descripcion;
        private $fecha_ingreso;
        private $tabla;

        public function __construct(){
            $this->descripcion = '';
            $this->fecha_ingreso = '';
            $this->tabla = 'hoja_ruta';
        }

        public function create($num_ruta, $descripcion, $fecha_ingreso){
            $conex = new Database();
            $conexion = $conex->connect(); 
            try {
                $this->num_ruta = $num_ruta;    
                $this->descripcion = $descripcion;
                $this->fecha_ingreso = $fecha_ingreso;
                $query = "INSERT INTO $this->tabla (cod_ruta, descripcion, estado, fecha_ingreso) VALUES ($this->num_ruta, '$this->descripcion', true, '$this->fecha_ingreso')";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
        
        public function readMyRoute($ci){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT e.nombre, e.apellidos, e.fecha_nacimiento, hr.cod_ruta, hr.descripcion, hr.fecha_ingreso, ehr.ci_destino, ehr.estado FROM empleado e, hoja_ruta hr, empleado_hoja_ruta ehr WHERE hr.cod_ruta = ehr.cod_ruta AND e.ci = ehr.ci AND ehr.ci = $ci";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function readMySendRoute($ci){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT e.nombre, e.apellidos, e.fecha_nacimiento, hr.cod_ruta, hr.descripcion, hr.fecha_ingreso, ehr.ci_destino FROM empleado e, hoja_ruta hr, empleado_hoja_ruta ehr WHERE hr.cod_ruta = ehr.cod_ruta AND e.ci = ehr.ci AND ehr.ci_destino = $ci";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function getCodigo($num_ruta, $descripcion, $fecha_ingreso){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT cod_ruta FROM $this->tabla WHERE cod_ruta = $num_ruta AND descripcion = '$descripcion' AND fecha_ingreso = '$fecha_ingreso'";
                $res = $conexion->query($query)->fetchAll();
                foreach ($res as $cod) {
                    return $cod['cod_ruta'];
                }
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function tengoRutaPendiente($ci){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT * FROM $this->tabla r, empleado_hoja_ruta ehr, empleado e WHERE r.cod_ruta = ehr.cod_ruta AND e.ci = ehr.ci_destino AND ehr.ci_destino = $ci AND ehr.estado = true";
                return  $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
    }