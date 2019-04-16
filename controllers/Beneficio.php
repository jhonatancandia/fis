<?php
    require_once '../models/Beneficio.php';
    /** Seccion para registrar beneficio */
    if (isset($_POST['registrar'])){
        $beneficio = addslashes(strip_tags($_POST['beneficio']));
        $descripcion = addslashes(strip_tags($_POST['descripcion']));

        registrarBeneficio($beneficio, $descripcion);
    }

    function registrarBeneficio($beneficio, $descripcion){
        if(!empty($beneficio) and !empty($descripcion)){
            $benef = new Beneficio();
            if ($benef->create($beneficio, $descripcion)){
                header('Location: ../views/vacaciones/beneficio');
            }else{
                header('Location: ../views/vacaciones/beneficio?'.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/beneficio?'.base64_decode('falta_datos'));
        }
    }
/** Fin de Seccion para registrar beneficio */
/** Seccion para editar beneficio */
    if (isset($_POST['editar'])){
        $beneficio = addslashes(strip_tags($_POST['beneficio_e']));
        $descripcion = addslashes(strip_tags($_POST['descripcion_e']));
        $cod = addslashes(strip_tags($_POST['cod']));

        editarBeneficio($beneficio, $descripcion, $cod);
    }

    function editarBeneficio($t_beneficio, $descripcion, $cod){
        if(!empty($t_beneficio) and !empty($descripcion) and !empty($cod)){
            $beneficio = new Beneficio();
            
            if ($beneficio->update($t_beneficio, $descripcion, $cod)){
                header('Location: ../views/vacaciones/beneficio');
            }else{
                header('Location: ../views/vacaciones/beneficio?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/beneficio?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
/** Fin de Seccion para editar beneficio */
/** Seccion para eliminar beneficio */
    if (isset($_POST['eliminar'])){
        $cod = addslashes(strip_tags($_POST['cod_el']));

        eliminarBeneficio($cod);
    }

    function eliminarBeneficio($cod){
        if (!empty($cod)) {
            $bene = new beneficio();
            if ($bene->delete($cod)) {
                header('Location: ../views/vacaciones/beneficio');
            }else{
                header('Location: ../views/vacaciones/beneficio?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/beneficio?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }

    }
/** Fin de Seccion para eliminar beneficio */

