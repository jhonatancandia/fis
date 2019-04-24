<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Personal_unidad{
        private $cod_unidad;
        private $ci;
        private $fecha_inicio;
        private $fecha_fin;
        private $tabla;

        public function __construct(){
            $this->cod_unidad = '';
            $this->ci = '';
            $this->fecha_inicio = '';
            $this->fecha_fin = '';
            $this->tabla = 'empleado_unidad';
        }

        public function create($cod_unidad, $ci){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->fecha_inicio = date("Y-m-d");
                $this->fecha_fin = '0000-00-00';
                $this->cod_unidad = $cod_unidad;
                $this->ci = $ci;
                $query = "INSERT INTO $this->tabla (ci, cod_unidad, fecha_inicio, fecha_fin) VALUES ('$this->ci', $this->cod_unidad, '$this->fecha_inicio', '$this->fecha_fin')";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e.getMessage());
            }
        }
    }