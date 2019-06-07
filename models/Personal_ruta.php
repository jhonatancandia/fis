<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Personal_ruta{
        private $ci;
        private $cod_ruta;
        private $tabla;
        private $estado;
        private $procedencia;

        public function __construct(){
            $this->ci = '';
            $this->cod_ruta = '';
            $this->estado = '';
            $this->procedencia = '';
            $this->tabla = 'empleado_hoja_ruta';
        }

        public function create($ci, $cod_ruta, $procedencia){
            $conex = new Database();
            $conexion = $conex->connect(); 
            try {
               $this->ci = $ci;
               $this->cod_ruta = $cod_ruta;
               $this->estado = true;
               $this->procedencia = $procedencia;
               $query = "INSERT INTO $this->tabla (ci, cod_ruta, estado, ci_destino) VALUES ('$this->ci', $this->cod_ruta, $this->estado, $this->procedencia)";
               return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function cambiarEstado($ci){
            $conex = new Database();
            $conexion = $conex->connect(); 
            try {
               $query = "UPDATE $this->tabla SET estado = false WHERE ci_destino = '$ci'";
               return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
    }
        

    