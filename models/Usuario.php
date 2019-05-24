<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Usuario{
        private $username; 
        private $password;
        private $ci;
        private $tabla;
        private $rol;
        private $estado;

        public function __construct(){
            $this->username = '';
            $this->password = '';
            $this->ci = '';
            $this->rol = '';
            $this->tabla = 'usuario';
            $this->estado = true;
        }

        public function create($username, $password, $ci, $rol){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->username = $username;
                $this->password = $password;
                $this->ci = $ci;
                $this->rol = $rol;
                $query = "INSERT INTO $this->tabla (nombre_usuario, contrasenia, estado, ci, cod_rol) VALUES('$this->username', '$this->password', '$this->estado', '$this->ci', $this->rol)";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function read(){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT * FROM $this->tabla";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function getDatos($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT * FROM $this->tabla WHERE cod_usuario = $cod";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function editUsername($username, $cod_user){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->username = $username;
                $query = "UPDATE $this->tabla SET nombre_usuario = '$this->username' WHERE cod_usuario = $cod_user";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function editarPassword($cod, $password){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->password = $password;
                $query = "UPDATE $this->tabla SET contrasenia = '$this->password' WHERE cod_usuario = $cod";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function darBajaUsuario($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "UPDATE $this->tabla SET estado = false WHERE cod_usuario = $cod";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function activarUsuario($cod){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "UPDATE $this->tabla SET estado = true WHERE cod_usuario = $cod";
                return $conexion->prepare($query)->execute();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function existeUsuario($username, $password){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->username = $username;
                $this->password = $password;
                $query = "SELECT * FROM $this->tabla WHERE nombre_usuario = '$this->username' AND contrasenia = '$this->password' AND estado = true";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }

        public function getTipoRol($username, $password){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $this->username = $username;
                $this->password = $password;
                $query = "SELECT r.tipo_rol FROM usuario u, rol r WHERE u.cod_rol = r.cod_rol AND u.nombre_usuario = '$this->username' AND u.contrasenia = '$this->password'";
                $rol = $conexion->query($query)->fetchAll();
                foreach ($rol as $tipo_rol) {
                    return $tipo_rol['tipo_rol'];
                }
            } catch (PDOException $e) {
                exit("Error: ".$e->getMessage());
            }
        }
    }