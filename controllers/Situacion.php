<?php
    require_once '../models/Situacion.php';
    /* Seccion para registrar la situacion */
    if(isset($_POST['registrar'])){
        $nombre = addslashes(strip_tags($_POST['situacion']));
        $descripcion = addslashes(strip_tags($_POST['descripcion']));
        
        registrarSituacion($nombre, $descripcion);
    }

    function registrarSituacion($nombre, $descripcion){
        if(!empty($nombre) and !empty($descripcion)){
            $situacion = new Situacion();
            if($situacion->create($nombre, $descripcion)){
                header('Location: ../views/vacaciones/situacion');
            }else{
                header('Location: ../views/vacaciones/situacion?'.base64_encode('res').'='.base64_encode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/situacion?'.base64_encode('res').'='.base64_encode('falta_datos'));
        }
    }
    /* Fin Seccion para registrar la situacion */
    /* Seccion para editar la situacion */
    if(isset($_POST['editar'])){
        $situacion = addslashes(strip_tags($_POST['situacion_e']));
        $descripcion = addslashes(strip_tags($_POST['descripcion_e']));
        $cod = addslashes(strip_tags($_POST['cod']));

        editarSituacion($situacion, $descripcion, $cod);
    }

    function editarSituacion($situacion, $descripcion, $cod){
        if(!empty($situacion) and !empty($descripcion) and !empty($descripcion)){
            $situ = new Situacion();
            if($situ->update($situacion, $descripcion, $cod)){
                header('Location: ../views/vacaciones/situacion');  
            }else{
                header('Location: ../views/vacaciones/situacion?'.base64_encode('res').'='.base64_encode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/situacion?'.base64_encode('res').'='.base64_encode('falta_datos'));
        }
    }
    /* Fin Seccion para editar la situacion */
    /* Seccion para eliminar la situacion */
    if(isset($_POST['eliminar'])){
        $cod = addslashes(strip_tags($_POST['cod_el']));

        eliminarSituacion($cod);
    }

    function eliminarSituacion($cod){
        if(!empty($cod)){
            $situacion = new Situacion();
            if($situacion->delete($cod)){
                header('Location: ../views/vacaciones/situacion'); 
            }else{
                header('Location: ../views/vacaciones/situacion?'.base64_encode('res').'='.base64_encode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/situacion?'.base64_encode('res').'='.base64_encode('falta_datos'));
        }
    }
    /* Fin Seccion para eliminar la situacion */
