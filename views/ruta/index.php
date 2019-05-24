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
                            <a class="nav-link" href="../vacaciones/personal">PERSONAL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vacaciones/cargos">CARGOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ruta">RUTA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vacaciones/unidad">UNIDAD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vacaciones/situacion">SITUACION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vacaciones/beneficio">BENEFICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">REPORTES</a>
                        </li>
                <?php
                    }elseif (!empty($_SESSION) and $_SESSION['rol'] == "usuario") {
                        echo $_SESSION['rol'];
                ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="">RUTA</a>
                        </li>
                <?php        
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
    <!-- Tabla ruta -->
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="col-10" style="padding : 0;">
                <h5 class="text-center">RUTA</h5>
                <div class="row mt-5">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalNuevaRuta">
                                NUEVA RUTA
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">N° RUTA</th>
                                <th scope="col" class="text-center">FECHA DE INGRESO</th>
                                <th scope="col" class="text-center">PROCEDENCIA</th>
                                <th scope="col" class="text-center">DESCRIPCION</th>
                                <th scope="col" class="text-center">DERIVADO</th>
                                <th scope="col" class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require_once '../../models/Ruta.php'; 
                                $rut = new Ruta();
                                $ruta = $rut->read();
                                foreach ($ruta as $r) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $r['cod_ruta'];?></td>
                                <td class="text-center"><?= $r['fecha_ingreso'];?></td>
                                <td class="text-center"><?=$r['nombre'].' '.$r['apellidos']?></td>
                                <td class="text-center"><?= $r['descripcion'];?></td>
                                <td class="text-center"><?=$r['cargo']?></td>
                                <td class="text-center">
                                    <a href="" title="Eliminar" data-toggle="modal"
                                        data-target="#modalEliminarRuta<?=$r['cod_ruta'];?>"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <!-- Modal eliminar ruta -->
                            <form action="../../controllers/Ruta.php" method="post">
                                <div class="modal fade" tabindex="-1" role="dialog" id="modalEliminarRuta<?=$r['cod_ruta'];?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">¿Estas seguro que deseas eliminar?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <input type="hidden" value="<?= $r['cod_ruta']?>" name="cod_ruta_el">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                                <button type="submit" name="eliminar" class="btn btn-danger">Si</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Final Modal eliminar ruta -->
                            <?php        
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Tabla ruta -->
    <!-- Modal registrar nueva ruta -->
    <form action="../../controllers/Ruta.php" method="post">
        <div class="modal fade" id="modalNuevaRuta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">NUEVA RUTA</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" id="datepicker2" placeholder="Fecha de ingreso"
                                name="fecha_ingreso" />
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="procedencia" required>
                                <option>Elegir procedencia</option>
                                <?php
                                    require_once '../../models/Personal.php';
                                    $personal = new Personal();
                                    $personal = $personal->read();
                                    foreach ($personal as $per){
                                ?>
                                <option value="<?= $per['ci']?>"><?= $per['nombre'].' '.$per['apellidos']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment" placeholder="Descripción"
                                name="descripcion" required></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="derivado" required>
                                <option>Elegir derivado</option>
                                <?php
                                    require_once '../../models/Cargo.php';
                                    $cargo = new Cargo();
                                    $cargos = $cargo->read();
                                    foreach ($cargos as $carg){
                                ?>
                                <option value="<?= $carg['nro_item']?>"><?= $carg['cargo']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Final Modal registrar ruta -->
    <?php 
        include '../layout/error.php';
        include '../layout/script.php';    
    ?>
</body>

</html>