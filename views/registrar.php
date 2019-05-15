<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../public/img/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Fiscalia Departamental de Cochabamba</title>
</head>

<body>
    <!-- Alertas -->
    <div class="alert alert-danger alert-dismissible fade show oculto" id="error-reg" role="alert">
        <span class="mensaje-alerta">Error en registro</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-warning alert-dismissible fade show oculto" id="falt-camp" role="alert">
        <span class="mensaje-alerta">Debe ingresar todos los campos solicitados</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- Fin de Alertas -->
    <!-- Tabla usuarios -->
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="col-10" style="padding : 0;">
                <h5 class="text-center">USUARIO</h5>
                <div class="row mt-5">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalNuevoEmpleado">
                                NUEVO USUARIO
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">USUARIO</th>
                                <th scope="col" class="text-center">CONTRASEÑA</th>
                                <th scope="col" class="text-center" width="300">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">lolalamehuevos</td>
                                <td class="text-center">paskdojq341a/s!@#!</td>
                                <td class="text-center" width="300">
                                    <a href="" title="Cambiar nombre de usuario" data-toggle="modal" data-target="#modalEditarUsername"><i
                                            class="far fa-edit"></i></a>
                                    <a href="" title="Eliminar" data-toggle="modal"
                                        data-target="#modalEliminarUsername"><i class="far fa-trash-alt"></i></a>
                                    <a href="" title="Cambiar contraseña" data-toggle="modal"
                                        data-target="#modalEditarPassword"><i class="fas fa-key"></i></a>
                                </td>
                            </tr>
                            <!-- Modal editar usuarios -->
                            <form action="../../controllers/personal.php" method="post">
                                <div class="modal fade" id="modalEditarUsername" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">EDITAR USUARIO</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nombre_u">Nombre de usuario</label>
                                                    <input type="text" class="form-control" value="" id="disabledInput" name="nombre_e"
                                                        required>
                                                    <label for="new_name_user">Nuevo nombre de usuario</label>
                                                    <input type="text" class="form-control" value="" name="new_name_user"
                                                        required>
                                                </div>
                                                
                                                <input type="hidden" value="" name="ci_e">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary"
                                                    name="editar">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Final Modal editar usuarios -->
                            <!-- Modal eliminar usuarios -->
                            <form action="../../controllers/personal.php" method="post">
                                <div class="modal fade" tabindex="-1" role="dialog" id="modalEliminarEmpleado">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">¿Estas seguro que deseas eliminar?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <input type="hidden" value="" name="ci_el">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">No</button>
                                                <button type="submit" name="eliminar"
                                                    class="btn btn-success">Si</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Final Modal eliminar empleado -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Tabla usuarios -->
    <!-- Modal registrar usuarios -->
    <form action="../../controllers/Usuario.php" method="post">
        <div class="modal fade" id="modalNuevoEmpleado" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">NUEVO USUARIO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre de usuario" name="nombre_usuario"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Final Modal registrar usuarios -->
    <?php 
        include 'layout/error.php';
        include 'layout/script.php';    
    ?>
    <script src="../public/js/auth.js"></script>    
</body>

</html>