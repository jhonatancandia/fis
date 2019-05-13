<?php
    require_once '../models/Cas.php';
    /** Seccion para registrar cas */
    if (isset($_POST['registrar'])) {
        $n_cas = addslashes(strip_tags($_POST['cas']));
        $rango = addslashes(strip_tags($_POST['rango']));
        $dias = addslashes(strip_tags($_POST['dias']));
        
        registrarCas($n_cas, $rango, $dias);
    }
    function registrarCas($n_cas, $rango, $dias){
        if(!empty($n_cas) and !empty($rango) and !empty($dias)){
            $cas = new Cas();
            if ($cas->create($n_cas, $rango, $dias)){
                header('Location: ../views/vacaciones/cas');
            }else{
                header('Location: ../views/vacaciones/cas?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/cas?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /**  Fin de Seccion para registrar cas */

    /** Seccion para editar cas */
    if (isset($_POST['editar'])){
        $e_cas = addslashes(strip_tags($_POST['cas_e']));
        $rango = addslashes(strip_tags($_POST['rango_e']));
        $dias = addslashes(strip_tags($_POST['dias_e']));
        $cod_cas = addslashes(strip_tags($_POST['cod_cas']));

        editarCas($e_cas, $rango, $dias, $cod_cas);
    }

    function editarCas($e_cas, $rango, $dias, $cod_cas){
        if(!empty($e_cas) and !empty($rango) and !empty($dias) and !empty($cod_cas)){
            $cs = new Cas();     
            if ($cs->update($e_cas, $rango, $dias, $cod_cas)){
                header('Location: ../views/vacaciones/cas');
            }else{
                header('Location: ../views/vacaciones/cas?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/cas?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /** Fin de Seccion para editar cas */
    /** Seccion para eliminar cas */
    if (isset($_POST['eliminar'])){
        $cod_cas = addslashes(strip_tags($_POST['cod_el']));

        eliminarCas($cod_cas);
    }

    function eliminarCas($cod_cas){
        if (!empty($cod_cas)) {
            $cs = new Cas();
            if ($cs->delete($cod_cas)) {
                header('Location: ../views/vacaciones/cas');
            }else{
                header('Location: ../views/vacaciones/cas?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/cas?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }

    }
    /** Fin de Seccion para eliminar cas */





