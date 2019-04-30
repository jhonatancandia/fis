<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Personal_ruta{
        private $ci;
        private $cod_ruta;
        private $tabla;
        private $estado;

        public function __construct(){
            $this->ci = '';
            $this->cod_ruta = '';
            $this->estado = '';
            $this->tabla = 'empleado_hoja_ruta';
        }

        public function create($ci, $cod_ruta){
            $conex = new Database();
            $conexion = $conex->connect(); 
            try {
               $this->ci = $ci;
               $this->cod_ruta = $cod_ruta;
               $this->estado = true;
               $query = "INSERT INTO $this->tabla (ci, cod_ruta, estado) VALUES ('$this->ci', $this->cod_ruta, $this->estado)";
               return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

    }
        

    