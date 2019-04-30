<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/fiscalia/config/Database.php';

    class Reporte{
        public function __construct(){}
        
        public function getReporte(){
            $conex = new Database();
            $conexion = $conex->connect();
            try {
                $query = "SELECT * FROM empleado e, cargo car, empleado_cargo ec, unidad u, empleado_unidad eu, situacion s, empleado_situacion es, cas c, empleado_cas ecs WHERE e.ci = ec.ci AND car.nro_item = ec.nro_item AND u.cod_unidad = eu.cod_unidad AND e.ci = eu.ci AND es.cod_situacion = s.cod_situacion AND e.ci = es.ci AND c.cod_cas = ecs.cod_cas AND e.ci = ecs.ci AND e.estado = true ";
                return $conexion->query($query)->fetchAll();
            } catch (PDOException $e) {
                exit('Error: '.$e->getMessage());
            }
        }
    }