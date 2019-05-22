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
                            <a class="nav-link active" href="../ruta">RUTA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="unidad">UNIDAD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="situacion">SITUACION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">BENEFICIO</a>
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
    <!-- Fin Alertas -->
    <!-- Tabla de cargo -->
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="col-10" style="padding : 0;">
                <h5 class="text-center">CARGOS</h5>
                <div class="row mt-5">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalNuevoCargo">
                                NUEVO CARGO
                            </button>
                        </div>
                    </div>
                </div>
                <table class="table table-hover mt-2">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ITEM</th>
                            <th scope="col" class="text-center">CARGO</th>
                            <th scope="col" class="text-center">TIPO DE CARGO</th>
                            <th scope="col" class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once '../../models/Cargo.php';
                            $carg = new Cargo();
                            $cargo = $carg->read();
                            foreach ($cargo as $car) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $car['nro_item'];?></td>
                            <td class="text-center"><?= $car['cargo'];?></td>
                            <td class="text-center"><?= $car['tipo_cargo'];?></td>
                            <td class="text-center">
                                <a href="" title="Editar" data-toggle="modal" data-target="#modalEditar<?= $car['nro_item'];?>"><i
                                        class="far fa-edit"></i></a>
                                <a href="" title="Eliminar" data-toggle="modal" data-target="#modalEliminar<?= $car['nro_item'];?>"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <!-- Modal editar cargo -->
                        <form action="../../controllers/Cargo.php" method="post">
                            <div class="modal fade" id="modalEditar<?= $car['nro_item'];?>" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">EDITAR CARGO</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                require_once '../../models/Cargo.php';
                                                $datos = new Cargo();
                                                $datos = $datos->getDatos($car['nro_item']);
                                                foreach ($datos as $valor) {
                                            ?>
                                                <div class="form-group">
                                                    <label for="nro_item_e">Item</label>
                                                    <input type="text" class="form-control" value="<?= $valor['nro_item'];?>" name="nro_item_e" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipo_cargo_e">Cargo</label>
                                                    <input type="text" class="form-control" value="<?= $valor['cargo'];?>" name="tipo_cargo_e" required>
                                                </div>
                                                <input type="hidden" value="<?= $valor['nro_item'];?>" name="cod">
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
                        <!-- Final Modal editar cargo -->
                        <!-- Modal eliminar cargo -->
                        <form action="../../controllers/Cargo.php" method="post">
                                <div class="modal fade" id="modalEliminar<?= $car['nro_item'];?>" tabindex="-1" role="dialog">
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
                                            <input type="hidden" name="cod_el" value="<?= $car['nro_item'];?>">
                                            <button type="submit" class="btn btn-success" name="eliminar">Si</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <!-- Final Modal eliminar cargo -->
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Fin Tabla de cargo -->
    <!-- Modal registrar cargo -->
    <form action="../../controllers/Cargo.php" method="post">
        <div class="modal fade" id="modalNuevoCargo" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">NUEVO CARGO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Numero de item" name="nro_item" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre del cargo" name="cargo" required>
                        </div>          
                        <div class="form-group">
                            <select class="form-control" name="tipo_cargo" required>
                                <option>Elegir tipo de cargo</option>
                                <?php 
                                    require_once '../../models/Cargo_tipo.php';
                                    $tipos_c = new Cargo_tipo();
                                    $tipos = $tipos_c->read();
                                    foreach ($tipos as $tipo) {
                                ?>
                                        <option value="<?= $tipo['cod_tipo_cargo'] ?>"><?= $tipo['tipo_cargo'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
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
    <!-- Final Modal registrar cargo -->
    <?php 
        include '../layout/error.php';
        include '../layout/script.php';    
    ?>
</body>

</html>