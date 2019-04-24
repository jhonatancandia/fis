<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Personal_cas{
        private $cod_cas;
        private $ci;
        private $fecha_inicio;
        private $fecha_fin;
        private $tabla;

        public function __construct(){
            $this->cod_unidad = '';
            $this->ci = '';
            $this->fecha_inicio = '';
            $this->fecha_fin = '';
            $this->tabla = 'empleado_cas';
        }

        public function create($cod_cas, $ci){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->fecha_inicio = date("Y-m-d");
                $this->fecha_fin = '0000-00-00';
                $this->cod_cas = $cod_cas;
                $this->ci = $ci;
                $query = "INSERT INTO $this->tabla (cod_cas, ci, fecha_inicio, fecha_fin) VALUES ($this->cod_cas, '$this->ci', '$this->fecha_inicio', '$this->fecha_fin')";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e.getMessage());
            }
        }
    }