<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Personal{
        private $ci;
        private $nombres;
        private $apellidos;
        private $fecha_nac;
        private $celular;
        private $telefono;
        private $correo;
        private $fecha_ing;
        private $situacion;
        private $unidad;
        private $cas;

        public function __construct(){
            $this->ci = '';
            $this->nombres = '';
            $this->apellidos = '';
            $this->fecha_nac = '';
            $this->celular = '';
            $this->telefono = '';
            $this->correo = '';
            $this->fecha_ing = '';
            $this->cas = '';
            $this->tabla = 'empleado';
        }

        public function create($ci, $nombres, $apellidos, $fecha_nac, $correo, $celular, $telefono, $fecha_ing, $cas){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->ci = $ci;
                $this->nombres = $nombres;
                $this->apellidos = $apellidos;
                $this->fecha_nac = $fecha_nac;
                $this->correo = $correo;
                $this->celular = $celular;
                $this->telefono = $telefono;
                $this->fecha_ing = $fecha_ing;
                $this->cas = $cas;
                $query = "INSERT INTO $this->tabla (ci, nombre, apellidos, fecha_nacimiento, email, estado, celular, telefono, fecha_ingreso, cas) VALUES ('$this->ci', '$this->nombres', '$this->apellidos', '$this->fecha_nac', '$this->correo', true, '$this->celular', '$this->telefono', '$this->fecha_ing' , $this->cas)";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function read(){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT e.cas, e.nombre, e.apellidos, c.cargo, e.ci, e.celular, e.telefono, s.tipo_situacion, u.nombre_unidad, e.fecha_ingreso 
                FROM 
                    empleado e, empleado_cargo ec, cargo c, empleado_situacion es, 
                    situacion s, empleado_unidad eu, unidad u
                    WHERE e.ci = ec.ci AND c.nro_item = ec.nro_item AND
                    es.cod_situacion = s.cod_situacion AND e.ci = es.ci AND eu.cod_unidad = u.cod_unidad AND
                    eu.ci = e.ci AND e.estado = true";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function update($ci, $nombres, $apellidos, $fecha_nac, $celular, $telefono, $correo, $fecha_ing, $cas){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->ci = $ci;
                $this->nombres = $nombres;
                $this->apellidos = $apellidos;
                $this->fecha_nac = $fecha_nac;
                $this->correo = $correo;
                $this->celular = $celular;
                $this->telefono = $telefono;
                $this->fecha_ing = $fecha_ing;
                $this->cas = $cas;
                $query = "UPDATE $this->tabla SET 
                    nombre = '$this->nombres', apellidos = '$this->apellidos', 
                    fecha_nacimiento = '$this->fecha_nac', email = '$this->correo', celular = '$this->celular', 
                    telefono = '$this->telefono', fecha_ingreso = '$this->fecha_ing', cas = '$this->cas' WHERE ci = '$ci'";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function getDatos($ci){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT * FROM $this->tabla WHERE ci = '$ci'";
                return  $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function delete($ci){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "UPDATE $this->tabla SET estado = false WHERE ci = '$ci'";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function personalSinCuenta(){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT DISTINCT ci, nombre, apellidos FROM empleado WHERE estado = true AND ci NOT IN (SELECT ci FROM usuario)";
                return  $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function getCi($username, $password){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT ci FROM usuario u WHERE u.nombre_usuario = '$username' AND u.contrasenia = '$password'";
                $usuario = $conexion->query($query)->fetchAll();
                foreach ($usuario as $ci) {
                    return $ci['ci'];
                }
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
    }
