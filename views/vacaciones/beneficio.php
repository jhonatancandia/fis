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
                            <a class="nav-link" href="situacion">SITUACION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">BENEFICIO</a>
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
    <div class= "alert alert-danger alert-dismissible fade show oculto" id="error-reg" role="alert">
        <span class="mensaje-alerta">Error en registro</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class= "alert alert-warning alert-dismissible fade show oculto" id="falt-camp" role="alert">
        <span class="mensaje-alerta">Debe ingresar todos los campos solicitados</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- Fin de Alertas -->
    <!-- Tabla de beneficio -->
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="col-10" style="padding : 0;">
                <h5 class="text-center">BENEFICIOS</h5>
                <div class="row mt-5">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar..." required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalNuevoCargo">
                                NUEVO BENEFICIO
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">BENEFICIO</th>
                                <th scope="col" class="text-center">DESCRIPCION</th>
                                <th scope="col" class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require_once '../../models/Beneficio.php';
                                $beneficio = new Beneficio();
                                $beneficio = $beneficio->read();
                                foreach ($beneficio as $bene) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $bene['tipo_beneficio'];?></td>
                                    <td class="text-center"><?php echo $bene['descripcion'];?></td>
                                    <td class="text-center">
                                        <a href="" title="Editar" data-toggle="modal" data-target="#modalEditar<?= $bene['cod_beneficio'];?>"><i
                                                class="far fa-edit"></i></a>
                                        <a href="" title="Eliminar" data-toggle="modal" data-target="#modalEliminar<?= $bene['cod_beneficio'];?>"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <!-- Modal editar beneficio -->
                                <form action="../../controllers/Beneficio.php" method="post">
                                    <div class="modal fade" id="modalEditar<?= $bene['cod_beneficio'];?>" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">EDITAR BENEFICIO</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <?php
                                                            $datos = new Beneficio();
                                                            $datos = $datos->getDatos($bene['cod_beneficio']);
                                                            foreach ($datos as $valor){
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="beneficio_e">Beneficio</label>
                                                            <input type="text" class="form-control" name="beneficio_e" value=
                                                            "<?= $valor['tipo_beneficio']?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="descripcion_e">Descripcion</label>
                                                            <textarea class="form-control" name="descripcion_e" rows="5" id="comment" required><?= $valor['descripcion']?></textarea>
                                                        </div>
                                                            <input type="hidden" value="<?= $valor['cod_beneficio']?>" name="cod">
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
                                <!-- Final Modal editar beneficio -->
                                <!-- Modal eliminar beneficio -->
                                <form action="../../controllers/Beneficio.php" method="post">
                                    <div class="modal fade" tabindex="-1" role="dialog" id="modalEliminar<?= $bene['cod_beneficio'];?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">¿Estas seguro que deseas eliminar?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <input type="hidden" value="<?= $bene['cod_beneficio'];?>" name="cod_el">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                <button type="submit" name="eliminar" class="btn btn-success">Si</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Final Modal eliminar beneficio -->
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Tabla de beneficio -->
    <!-- Modal registrar beneficio -->
    <form action="../../controllers/Beneficio.php" method="post">
        <div class="modal fade" id="modalNuevoCargo" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">NUEVO BENEFICIO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Beneficio" name="beneficio" required>
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
    <!-- Final Modal registrar beneficio -->
    <?php 
        include '../layout/error.php';
        include '../layout/script.php';    
    ?>
</body>

</html>