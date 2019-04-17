<!DOCTYPE html>
<html lang="en">
<?php 
    include '../layout/head.php';
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
                    <a href="../../">
                        <img src="../../public/img/logo.png" alt="Logo index" width="40" height="40">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="personal">PERSONAL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cargos">CARGOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">RUTA</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">UNIDAD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="situacion">SITUACION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="beneficio">BENEFICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">REPORTES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cas">CAS</a>
                </li>
            </ul>
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
    <!-- Fin Alertas -->
    <!-- Tabla unidad -->
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="col-10" style="padding : 0;">
                <h5 class="text-center">UNIDAD</h5>
                <div class="row mt-5">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalNuevaUnidad">
                                NUEVA UNIDAD
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">UNIDAD</th>
                                <th scope="col" class="text-center">DIRECCION</th>
                                <th scope="col" class="text-center">TELEFONO</th>
                                <th scope="col" class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require_once '../../models/unidad.php';
                                $unid = new Unidad();
                                $unidad = $unid->read();
                                foreach ($unidad as $uni) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $uni['nombre_unidad'];?></td>
                                <td class="text-center"><?= $uni['direccion'];?></td>
                                <td class="text-center"><?= $uni['telefono'];?></td>
                                <td class="text-center">
                                    <a href="" title="Editar" data-toggle="modal" data-target="#modalEditarUnidad<?= $uni['cod_unidad'];?>"><i
                                            class="far fa-edit"></i></a>
                                    <a href="" title="Eliminar" data-toggle="modal" data-target="#modalEliminarUnidad<?= $uni['cod_unidad'];?>"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <!-- Modal editar unidad -->
                            <form action="../../controllers/unidad.php" method="post">
                                <div class="modal fade" id="modalEditarUnidad<?= $uni['cod_unidad'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">EDITAR UNIDAD</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php 
                                                    $datos = new Unidad();
                                                    $datos = $datos->getDatos($uni['cod_unidad']);
                                                    foreach ($datos as $valor) {
                                                ?>
                                                    <div class="form-group">
                                                        <label for="nombre_unidad_e">Unidad</label>
                                                        <input type="text" class="form-control" value="<?= $valor['nombre_unidad'];?>" name="nombre_unidad_e" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="direccion_e">Dirección</label>
                                                        <input type="text" class="form-control" value="<?= $valor['direccion'];?>" name="direccion_e" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telefono_e">Telefono</label>
                                                        <input type="text" class="form-control" value="<?= $valor['telefono'];?>" name="telefono_e" required>
                                                    </div>
                                                        <input type="hidden" value="<?= $valor['cod_unidad'];?>" name="cod">
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
                            <!-- Final Modal editar unidad -->
                            <!-- Modal eliminar unidad -->
                            <form action="../../controllers/unidad.php" method="post">
                                <div class="modal fade" id="modalEliminarUnidad<?= $uni['cod_unidad'];?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Esta seguro que desea eliminar?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                            <input type="hidden" name="cod_el" value="<?= $uni['cod_unidad'];?>">
                                            <button type="submit" class="btn btn-danger" name="eliminar">Si</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Final Modal eliminar unidad -->
                            <?php
                                } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>
    <!-- Fin Tabla unidad -->
    <!-- Modal registrar nueva unidad -->
    <form action="../../controllers/unidad.php" method="post">
        <div class="modal fade" id="modalNuevaUnidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">NUEVA UNIDAD</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre Unidad" name="nombre_unidad" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Dirección" name="direccion" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Telefono" name="telefono" required>
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
    <!-- Final Modal registrar unidad -->
    <?php 
        if(!empty($_REQUEST)){
             if($_REQUEST[base64_encode('res')] == base64_encode('error_query')){
    ?>
                <style>
                    #error-reg{
                        display:block;
                    }
                </style>
    <?php      
            }
            if($_REQUEST[base64_encode('res')] == base64_encode('falta_datos')){
    ?>
                <style>
                    #falt-camp{
                        display:block;
                    }
                </style>
    <?php
            }     
        }
    ?>
    <?php 
        include '../layout/script.php';    
    ?>
</body>

</html>