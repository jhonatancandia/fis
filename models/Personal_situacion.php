<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Personal_situacion{
        private $cod_situacion;
        private $ci;
        private $fecha_inicio;
        private $fecha_fin;
        private $tabla;

        public function __construct(){
            $this->cod_situacion = '';
            $this->ci = '';
            $this->fecha_inicio = '';
            $this->fecha_fin = '';
            $this->tabla = 'empleado_situacion';
        }

        public function create($cod_situacion, $ci){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->fecha_inicio = date("Y-m-d");
                $this->fecha_fin = '0000-00-00';
                $this->cod_situacion = $cod_situacion;
                $this->ci = $ci;
                $query = "INSERT INTO $this->tabla (cod_situacion, ci, fecha_inicio, fecha_fin) VALUES ($this->cod_situacion, '$this->ci', '$this->fecha_inicio', '$this->fecha_fin')";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e.getMessage());
            }
        }
    }