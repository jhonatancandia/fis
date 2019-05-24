<!DOCTYPE html>
<html lang="en">
<?php 
    include '../layout/head.php';
    session_start();
?>

<body>
    <!-- Menu navegacion -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <img src="../../public/img/logo.png" alt="Logo index" width="40" height="40">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <?php 
                    if(!empty($_SESSION) and $_SESSION['rol'] == "administrador"){
                ?>
                        <li class="nav-item">
                            <a class="nav-link" href="personal">PERSONAL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cargos">CARGOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ruta">RUTA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="unidad">UNIDAD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="situacion">SITUACION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="beneficio">BENEFICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../reportes">REPORTES</a>
                        </li>
                <?php
                    }elseif (!empty($_SESSION) and $_SESSION['rol'] == "usuario") {
                        header('Location: ../ruta');        
                    }else{
                        header('Location: ../../');
                    }
                ?>
            </ul>
            <a href="../../controllers/Usuario.php?peticion=logout" class="navbar-text">SALIR</a>
        </div>
    </nav>
    <!-- Fin menu navegacion -->
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
    <!-- Fin Alertas-->
    <!-- Tabla situacion -->
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="col-10" style="padding : 0;">
                <h5 class="text-center">SITUACION</h5>
                <div class="row mt-5">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalNuevaSituacion">
                                NUEVA SITUACION
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">SITUACION</th>
                                <th scope="col" class="text-center">DESCRIPCION</th>
                                <th scope="col" class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require_once '../../models/Situacion.php'; 
                                $situ = new Situacion();
                                $situacion = $situ->read();
                                foreach ($situacion as $sit) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $sit['tipo_situacion'];?></td>
                                    <td class="text-center"><?= $sit['descripcion']; ?></td>
                                    <td class="text-center">
                                        <a href="" title="Editar" data-toggle="modal" data-target="#modalEditar<?= $sit['cod_situacion'];?>"><i
                                                class="far fa-edit"></i></a>
                                        <a href="" title="Eliminar" data-toggle="modal" data-target="#modalEliminar<?= $sit['cod_situacion'];?>"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <!-- Modal editar situacion -->
                                <form action="../../controllers/Situacion.php" method="post">
                                    <div class="modal fade" id="modalEditar<?= $sit['cod_situacion'];?>" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">EDITAR SITUACION</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php 
                                                        $datos = new Situacion();
                                                        $datos = $datos->getDatos($sit['cod_situacion']);            
                                                        foreach ($datos as $valor) {
                                                    ?>   
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="<?= $valor['tipo_situacion'];?>" name="situacion_e" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea class="form-control" rows="5" id="comment" name="descripcion_e" required><?= $valor['descripcion'];?></textarea>
                                                            </div>
                                                            <input type="hidden" value="<?= $valor['cod_situacion']?>" name="cod">
                                                    <?php     
                                                        } 
                                                    ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary" name="editar">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Final Modal editar situacion -->
                                <!-- Modal eliminar situacion -->
                                <form action="../../controllers/Situacion.php" method="post">
                                    <div class="modal fade" tabindex="-1" role="dialog" id="modalEliminar<?= $sit['cod_situacion'];?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">¿Esta seguro que desea eliminar?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                <input type="hidden" value="<?= $sit['cod_situacion'];?>" name="cod_el">
                                                <button type="submit" name="eliminar" class="btn btn-success">Si</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Fin Modal eliminar situacion-->
                            <?php        
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Tabla situacion -->
    <!-- Modal registrar situacion -->
    <form action="../../controllers/Situacion.php" method="post"> 
        <div class="modal fade" id="modalNuevaSituacion" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">NUEVA SITUACION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre de situación" name="situacion" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="comment" placeholder="Descripción" name="descripcion" required></textarea>
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
    <!-- Final Modal registrar situacion --> 
    <?php 
        include '../layout/error.php';
        include '../layout/script.php';    
    ?>
</body>

</html>