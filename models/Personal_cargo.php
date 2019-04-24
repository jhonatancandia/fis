<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Personal_cargo{
        private $fecha_inicio;
        private $estado;
        private $nro_item;
        private $fecha_fin;
        private $ci;
        private $tabla;

        public function __construct(){
            $this->fecha_inicio = '';
            $this->fecha_fin = '';
            $this->estado = '';
            $this->nro_item = '';
            $this->ci = '';
            $this->tabla = 'empleado_cargo';
        }

        public function create($nro_item, $ci){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->fecha_inicio = date("Y-m-d");
                $this->fecha_fin = '0000-00-00';
                $this->estado = true;
                $this->nro_item = $nro_item;
                $this->ci = $ci;
                $query = "INSERT INTO $this->tabla (fecha_inicio, fecha_fin, estado, nro_item, ci) VALUES ('$this->fecha_inicio', '$this->fecha_fin', $this->estado, $this->nro_item, '$this->ci')";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e.getMessage());
            }
        }
    }