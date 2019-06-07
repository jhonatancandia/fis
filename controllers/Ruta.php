<?php
    require_once '../models/Ruta.php';
    require_once '../models/Personal_ruta.php';
    /* Seccion para registrar ruta */
    if(isset($_POST['enviar'])){
        $num_ruta = addslashes(strip_tags($_POST['num_ruta']));
        $derivado = addslashes(strip_tags($_POST['derivado']));
        $descripcion = addslashes(strip_tags($_POST['descripcion']));
        $fecha_ingreso = nuevaFecha(addslashes(strip_tags($_POST['fecha_ingreso'])));
        $procedencia = addslashes(strip_tags($_POST['procedencia']));

        registrarRuta($num_ruta, $derivado, $descripcion, $fecha_ingreso, $procedencia);
    }

    function registrarRuta($num_ruta, $derivado, $descripcion, $fecha_ingreso, $procedencia){
        if(!empty($num_ruta) and !empty($derivado) and !empty($descripcion) and !empty($fecha_ingreso) and !empty($procedencia)){
            $ruta = new Ruta();
            if($ruta->create($num_ruta, $descripcion, $fecha_ingreso)){
                $pr = new Personal_ruta();
                $cod_ruta = $ruta->getCodigo($num_ruta, $descripcion, $fecha_ingreso);
                if($pr->create($procedencia, $cod_ruta, $derivado)){
                    header('Location: ../views/ruta/');
                }
            }else{
                header('Location: ../views/ruta/?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/ruta/?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }

    function nuevaFecha($fecha){
        $nueva_fecha = "";
        $date = explode("-", $fecha);
        for ($i = count($date) - 1; $i >= 0; $i --) { 
            if($i == 0)
                $nueva_fecha = $nueva_fecha.$date[$i];
            else
                $nueva_fecha = $nueva_fecha.$date[$i]."-";
        }
        return $nueva_fecha;
    }
    /* Fin Seccion para registrar ruta */

     /** Seccion para cambiar estado de la ruta */

    if(isset($_POST['visto'])){
        $ci = addslashes(strip_tags($_POST['ci']));

        cambiarEstadoRuta($ci);
    }

    function cambiarEstadoRuta($ci){
        if(!empty($ci)){
            $personal_ruta = new Personal_ruta();
            if($personal_ruta->cambiarEstado($ci)){
                header('Location: ../views/ruta/');
            }else{
                header('Location: ../views/ruta/?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/ruta/?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
