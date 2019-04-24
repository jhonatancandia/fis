<?php 
    require_once '../models/Unidad.php';
    /*Seccion para registrar la unidad*/
    if(isset($_POST['registrar'])){
        $nombre_unidad = addslashes(strip_tags($_POST['nombre_unidad']));
        $direccion = addslashes(strip_tags($_POST['direccion']));
        $telefono = addslashes(strip_tags($_POST['telefono']));

        registrarUnidad($nombre_unidad, $direccion, $telefono);
    }

    function registrarUnidad($nombre_unidad, $direccion, $telefono){
        if(!empty($nombre_unidad) and !empty($direccion) and !empty($telefono)){
            $unidad = new Unidad();
            if($unidad->create($nombre_unidad, $direccion, $telefono)){
                header('Location: ../views/vacaciones/unidad');
            }else{
                header('Location: ../views/vacaciones/unidad?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/unidad?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /*Fin de la seccion para registrar la unidad */
    /*Seccion para editar la unidad */
    if(isset($_POST['editar'])){
        $nombre_unidad = addslashes(strip_tags($_POST['nombre_unidad_e']));
        $direccion = addslashes(strip_tags($_POST['direccion_e']));
        $telefono =addslashes(strip_tags($_POST['telefono_e']));
        $cod =addslashes(strip_tags($_POST['cod']));

        editarUnidad($nombre_unidad, $direccion, $telefono, $cod);
    }

    function editarUnidad($nombre_unidad, $direccion, $telefono, $cod){
        if(!empty($nombre_unidad) and !empty($direccion) and !empty($telefono) and !empty($cod)){
            $unidad = new Unidad();
            if($unidad->update($nombre_unidad, $direccion, $telefono, $cod)){
                header('Location: ../views/vacaciones/unidad');
            }else{
                header('Location: ../views/vacaciones/unidad?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/unidad?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /*Fin de la seccion para editar la unidad */
    /*Seccion para eliminar la unidad */
    if(isset($_POST['eliminar'])){
        $cod = addslashes(strip_tags($_POST['cod_el']));

        eliminarUnidad($cod);
    }

    function eliminarUnidad($cod){
        if(!empty($cod)){
            $unidad = new Unidad();
            if($unidad->delete($cod)){
                header('Location: ../views/vacaciones/unidad');
            }else{
                header('Location: ../views/vacaciones/unidad?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/unidad?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /*Fin de la seccion para eliminar la unidad*/ 
    
