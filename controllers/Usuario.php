<?php 
    require_once '../models/Usuario.php';
    session_start();
    /* Registrar usuario */
    if(isset($_POST['registrar'])){
        $username = addslashes(strip_tags($_POST['nombre_usuario']));
        $password = addslashes(strip_tags($_POST['password']));
        $ci = addslashes(strip_tags($_POST['ci']));

        registrarUsuario($username, $password, $ci);
    }

    function registrarUsuario($username, $password, $ci){
        if(!empty($username) and !empty($password) and !empty($ci)){
            $usuario = new Usuario();
            $password = base64_encode($password);
            if($usuario->create($username, $password, $ci)){
                header('Location: ../views/registrar');
            }else{
                header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /* Editar nombre de usuario */
    if(isset($_POST['editar_n_u'])){
        $username = addslashes(strip_tags($_POST['new_name_user']));
        $cod_user = addslashes(strip_tags($_POST['cod_u']));

        editUsername($username, $cod_user);
    }

    function editUsername($username, $cod_user){
        if(!empty($username) and !empty($cod_user)){
            $usuario = new Usuario();
            if($usuario->editUsername($username, $cod_user)){
                header('Location: ../views/registrar');
            }else{
                header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /* Editar contrasenia de usuario */
    if(isset($_POST['editar_pass'])){
        $cod_user = addslashes(strip_tags($_POST['cod_u']));
        $password = addslashes(strip_tags($_POST['contrasena_n']));
        $password_r = addslashes(strip_tags($_POST['contrasena_nr']));

        if($password === $password_r){
            editarPassword($cod_user, $password);
        }else{
            header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('error_query'));
        }
    }

    function editarPassword($cod_user, $password){
        if(!empty($password) and !empty($cod_user)){
            $user = new Usuario();
            $password = base64_encode($password);
            if($user->editarPassword($cod_user, $password)){
                header('Location: ../views/registrar');
            }else{
                header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /* Eliminar usuario */
    if(isset($_POST['eliminar'])){
        $cod_user = addslashes(strip_tags($_POST['cod_u']));

        darBajaUsuario($cod_user);
    }

    function darBajaUsuario($cod_user){
        if(!empty($cod_user)){
            $user = new Usuario();
            if($user->darBajaUsuario($cod_user)){
                header('Location: ../views/registrar');
            }else{
                header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }
    /* Dar de alta usuario */
    if(isset($_POST['activar'])){
        $cod_user = addslashes(strip_tags($_POST['cod_u']));

        activarUsuario($cod_user);
    }

    function activarUsuario($cod_user){
        if(!empty($cod_user)){
            $user = new Usuario();
            if($user->activarUsuario($cod_user)){
                header('Location: ../views/registrar');
            }else{
                header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('error_query'));
            }
        }else{
            header('Location: ../views/registrar?'.base64_decode('res').'='.base64_decode('falta_datos'));
        }
    }

    /* Login usuario */
    if(!empty($_REQUEST)){
        if ($_REQUEST['peticion'] == "login") {
            $username = addslashes(strip_tags($_POST['username']));
            $password = addslashes(strip_tags($_POST['password']));
            
            login($username, $password);
        }
    }

    function login($username, $password){
        if(!empty($username) and !empty($password)){
            $user = new Usuario();
            $password = base64_encode($password);
            if(count(($user->existeUsuario($username, $password))) > 0){
                $_SESSION['pass'] = base64_decode($password);
                $_SESSION['usuario'] = $username;
                echo 'correcto';
            }else{
                echo 'El usuario no existe, porfavor vuelva a intentarlo';
            }
        }else{
            echo 'Debe ingresar todos los datos';
        }
    }

    /* Logout Login */
    if(!empty($_REQUEST)){
        if ($_REQUEST['peticion'] == "logout") {
            session_destroy();
            header('Location: ../');
        }
    }