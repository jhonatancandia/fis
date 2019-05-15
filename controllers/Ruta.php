<?php
    require_once '../models/Ruta.php';
    require_once '../models/Personal_ruta.php';
    /* Seccion para registrar ruta */
    if(isset($_POST['enviar'])){
        $derivado = addslashes(strip_tags($_POST['derivado']));
        $descripcion = addslashes(strip_tags($_POST['descripcion']));
        $fecha_ingreso = addslashes(strip_tags($_POST['fecha_ingreso']));
        $procedencia = addslashes(strip_tags($_POST['procedencia']));

        registrarRuta($derivado, $descripcion, $fecha_ingreso, $procedencia);
    }

    function registrarRuta($derivado, $descripcion, $fecha_ingreso, $procedencia){
        if(!empty($derivado) and !empty($descripcion) and !empty($fecha_ingreso) and !empty($procedencia)){
            $ruta = new Ruta();
            if($ruta->create($descripcion, $fecha_ingreso)){
                $pr = new Personal_ruta();
                $cod_ruta = $ruta->getCodigo($descripcion, $fecha_ingreso);
                if($pr->create($procedencia, $cod_ruta)){
                    header('Location: ../views/ruta/');
                }
            }else{
                header('Location: ../views/ruta/?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/ruta/?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /* Fin Seccion para registrar ruta */
     /** Seccion para eliminar ruta */
     if (isset($_POST['eliminar'])){
        $cod_ruta = addslashes(strip_tags($_POST['cod_ruta_el']));
        
        eliminarRuta($cod_ruta);
    }

    function eliminarRuta($cod_ruta){
        if (!empty($cod_ruta)) {
            $ru = new Ruta();
            if ($ru->delete($cod_ruta)) {
                header('Location: ../views/ruta/');
            }else{
                header('Location: ../views/ruta/?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/ruta/?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }

    }
    /** Fin de Seccion para eliminar ruta */