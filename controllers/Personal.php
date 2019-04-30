<?php 
    require_once '../models/Personal.php';
    require_once '../models/Personal_cargo.php';
    require_once '../models/Personal_situacion.php';
    require_once '../models/Personal_unidad.php';
    require_once '../models/Personal_cas.php';
    
    /* Seccion para registrar la personal */
    if(isset($_POST['registrar'])){
        $ci = addslashes(strip_tags($_POST['ci']));
        $nombres = addslashes(strip_tags($_POST['nombres']));
        $apellidos = addslashes(strip_tags($_POST['apellidos']));
        $fecha_nac = addslashes(strip_tags($_POST['fecha_nac']));
        $celular = addslashes(strip_tags($_POST['celular']));
        $telefono = addslashes(strip_tags($_POST['telefono']));
        $correo = addslashes(strip_tags($_POST['correo']));
        $fecha_ing = addslashes(strip_tags($_POST['fecha_ing']));
        $cargo = addslashes(strip_tags($_POST['cargo']));
        $situacion = addslashes(strip_tags($_POST['situacion']));
        $unidad = addslashes(strip_tags($_POST['unidad']));
        $cas = addslashes(strip_tags($_POST['cas']));

        registrarPersonal($ci, $nombres, $apellidos, $fecha_nac, $celular, $telefono, $correo, $fecha_ing, $cargo, $situacion, $unidad, $cas);
    }

    function registrarPersonal($ci, $nombres, $apellidos, $fecha_nac, $celular, $telefono, $correo, $fecha_ing, $cargo, $situacion, $unidad, $cas){
        if(!empty($ci) and !empty($nombres) and !empty($apellidos) and !empty($fecha_nac) and !empty($celular) and !empty($telefono) and !empty($correo) and !empty($fecha_ing) and !empty($cargo) and !empty($situacion) and !empty($unidad) and !empty($cas)){
            $personal = new Personal();
            if($personal->create($ci, $nombres, $apellidos, $fecha_nac, $correo, $celular, $telefono, $fecha_ing)){
                $person_carg = new Personal_cargo();
                if($person_carg->create($cargo, $ci)){
                    $person_sit = new Personal_situacion();
                    if($person_sit->create($situacion, $ci)){
                        $person_uni = new Personal_unidad();
                        if($person_uni->create($unidad, $ci)){
                            $person_cas = new Personal_cas();
                            if($person_cas->create($cas, $ci)){
                                header('Location: ../views/vacaciones/personal');
                            }
                        }
                    }
                }
            }else{
                header('Location: ../views/vacaciones/personal?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/personal?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /* Fin Seccion para registrar la personal */
    /* Seccion para editar la personal */
    if(isset($_POST['editar'])){
        $ci = addslashes(strip_tags($_POST['ci_e']));
        $nombres = addslashes(strip_tags($_POST['nombre_e']));
        $apellidos = addslashes(strip_tags($_POST['apellido_e']));
        $fecha_nac = addslashes(strip_tags($_POST['fecha_nac_e']));
        $celular = addslashes(strip_tags($_POST['celular_e']));
        $telefono = addslashes(strip_tags($_POST['telefono_e']));
        $correo = addslashes(strip_tags($_POST['correo_e']));
        $fecha_ing = addslashes(strip_tags($_POST['fecha_ing_e']));
        
        editarPersonal($ci, $nombres, $apellidos, $fecha_nac, $celular, $telefono, $correo, $fecha_ing);
    }

    function editarPersonal($ci, $nombres, $apellidos, $fecha_nac, $celular, $telefono, $correo, $fecha_ing){
        if(!empty($ci) and !empty($nombres) and !empty($apellidos) and !empty($fecha_nac) and !empty($celular) and !empty($telefono) and !empty($correo) and !empty($fecha_ing)){
            $person = new Personal();
            if($person->update($ci, $nombres, $apellidos, $fecha_nac, $celular, $telefono, $correo, $fecha_ing)){
                header('Location: ../views/vacaciones/personal');  
            }else{
                header('Location: ../views/vacaciones/personal?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/personal?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /* Fin Seccion para editar la personal */
    /* Seccion para eliminar la personal */
    if(isset($_POST['eliminar'])){
        $ci = addslashes(strip_tags($_POST['ci_el']));

        eliminarPersonal($ci);
    }

    function eliminarPersonal($ci){
        if(!empty($ci)){
            $personal = new Personal();
            if($personal->delete($ci)){
                header('Location: ../views/vacaciones/personal'); 
            }else{
                header('Location: ../views/vacaciones/personal?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/vacaciones/personal?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /* Fin Seccion para eliminar la situacion */
