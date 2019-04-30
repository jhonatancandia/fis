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
                <li class="nav-item active">
                    <a href="../../">
                        <img src="../../public/img/logo.png" alt="Logo index" width="40" height="40">
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">PERSONAL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cargos">CARGOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../ruta/">RUTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="unidad">UNIDAD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="situacion">SITUACION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="beneficio">BENEFICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../reportes/">REPORTES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cas">CAS</a>
                </li>
            </ul>
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
    <!-- Tabla empleados -->
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="col-10" style="padding : 0;">
                <h5 class="text-center">PERSONAL</h5>
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
                                NUEVO PERSONAL
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">NOMBRE</th>
                                <th scope="col" class="text-center">CARGO</th>
                                <th scope="col" class="text-center">CI</th>
                                <th scope="col" class="text-center">CELULAR</th>
                                <th scope="col" class="text-center">TELEFONO</th>
                                <th scope="col" class="text-center">SITUACION</th>
                                <th scope="col" class="text-center">UNIDAD</th>
                                <th scope="col" class="text-center">FECHA INGRESO</th>
                                <th scope="col" class="text-center" width="300">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require_once '../../models/Personal.php';
                                $personal = new Personal();
                                $personales = $personal->read();
                                foreach ($personales as $person) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?= $person['nombre'] ?></td>
                                        <td class="text-center"><?= $person['cargo'] ?></td>
                                        <td class="text-center"><?= $person['ci'] ?></td>
                                        <td class="text-center"><?= $person['celular'] ?></td>
                                        <td class="text-center"><?= $person['telefono'] ?></td>
                                        <td class="text-center"><?= $person['tipo_situacion'] ?></td>
                                        <td class="text-center"><?= $person['nombre_unidad'] ?></td>
                                        <td class="text-center"><?= $person['fecha_ingreso'] ?></td>
                                        <td class="text-center" width="300">
                                            <a href="" title="Editar" data-toggle="modal" data-target="#modalEditarEmpleado<?= $person['ci'] ?>"><i
                                                    class="far fa-edit"></i></a>
                                            <a href="" title="Eliminar" data-toggle="modal" data-target="#modalEliminarEmpleado<?= $person['ci'] ?>"><i
                                                    class="far fa-trash-alt"></i></a>
                                            <a href="" title="Vacaciones" data-toggle="modal" data-target="#modalVacaciones"><i
                                                    class="fas fa-plane"></i></a>
                                            <a href="" title="Permiso" data-toggle="modal" data-target="#modalPermiso"><i
                                                    class="fas fa-procedures"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Modal editar empleado -->
                                    <form action="../../controllers/personal.php" method="post">
                                        <div class="modal fade" id="modalEditarEmpleado<?= $person['ci'] ?>" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">EDITAR PERSONAL</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <?php 
                                                            $personal = new Personal();
                                                            $personales = $personal->getDatos($person['ci']);
                                                            foreach ($personales as $persona) {
                                                        ?>
                                                                <div class="form-group">
                                                                    <label for="nombre_e">Nombre(s)</label>
                                                                    <input type="text" class="form-control" value="<?= $persona['nombre'] ?>" name="nombre_e" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="apellido_e">Apellido(s)</label>
                                                                    <input type="text" class="form-control" value="<?= $persona['apellidos'] ?>" name="apellido_e" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fecha_nac_e">Fecha de nacimiento</label>
                                                                    <input type="text" class="form-control" value="<?= $persona['fecha_nacimiento'] ?>" name="fecha_nac_e" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="direccion_e">Celular</label>
                                                                    <input type="text" class="form-control" value="<?= $persona['celular'] ?>" name="celular_e" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="telefono_e">Telefono</label>
                                                                    <input type="text" class="form-control" value="<?= $persona['telefono'] ?>" name="telefono_e" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="correo_e">Correo electronico</label>
                                                                    <input type="email" class="form-control" value="<?= $persona['email'] ?>" name="correo_e" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fecha_ing_e">Fecha ingreso</label>
                                                                    <input type="text" class="form-control" value="<?= $persona['fecha_ingreso'] ?>" name="fecha_ing_e" required>
                                                                </div>
                                                                <input type="hidden" value="<?= $person['ci']?>" name="ci_e">
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
                                    <!-- Final Modal editar empleado -->
                                    <!-- Modal eliminar empleado -->
                                    <form action="../../controllers/personal.php" method="post">
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modalEliminarEmpleado<?= $person['ci'] ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">¿Estas seguro que deseas eliminar?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <input type="hidden" value="<?= $person['ci'] ?>" name="ci_el">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                        <button type="submit" name="eliminar" class="btn btn-success">Si</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Final Modal eliminar empleado -->
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Tabla empleados -->
    <!-- Modal registrar empleado -->
    <form action="../../controllers/personal.php" method="post">
        <div class="modal fade" id="modalNuevoEmpleado" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">NUEVO PERSONAL</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Carnet de Identidad" name="ci" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre(s)" name="nombres" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Apellido(s)" name="apellidos" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="datepicker0" placeholder="Fecha de nacimiento" name="fecha_nac" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Celular" name="celular" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Telefono" name="telefono" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Correo electronico" name="correo" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="datepicker1" placeholder="Fecha de ingreso" name="fecha_ing" required/>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="cargo" required>
                                <option>Elegir un cargo</option>
                                <?php 
                                    require_once '../../models/cargo.php'; 
                                    $cargo = new Cargo();
                                    $cargos = $cargo->read();
                                    foreach ($cargos as $carg) {
                                ?>
                                        <option value="<?= $carg['nro_item'] ?>"><?= $carg['cargo'] ?></option>
                                <?php
                                    } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="situacion" required>
                                <option>Elegir situacion</option>
                                <?php 
                                    require_once '../../models/situacion.php';
                                    $situacion = new Situacion();
                                    $situaciones = $situacion->read();
                                    foreach ($situaciones as $sit) {
                                ?>
                                        <option value="<?= $sit['cod_situacion'] ?>"><?= $sit['tipo_situacion'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="unidad" required>
                                <option>Elegir unidad</option>
                                <?php 
                                    require_once '../../models/unidad.php';
                                    $unidad = new Unidad();
                                    $unidades = $unidad->read();
                                    foreach ($unidades as $unid) {
                                ?>
                                        <option value="<?= $unid['cod_unidad'] ?>"><?= $unid['nombre_unidad'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="cas" required>
                                <option>Elegir CAS</option>
                                <?php 
                                    require_once '../../models/cas.php';
                                    $cas = new Cas();
                                    $ca = $cas->read();
                                    foreach ($ca as $c) {
                                ?>   
                                        <option value="<?= $c['cod_cas'] ?>"><?= $c['cas'] ?></option>
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
    <!-- Final Modal registrar empleado -->
    <!-- Modal vacaciones empleado -->
    <div class="modal fade" id="modalVacaciones" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REGISTRAR VACACION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" id="datepicker4" placeholder="Fecha de inicio" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="datepicker5" placeholder="Fecha fin" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="comment" placeholder="Observación"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Gestión">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Final Modal vacaciones -->
    <!-- Modal permiso -->
    <div class="modal fade" id="modalPermiso" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REGISTRAR PERMISO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" id="datepicker6" placeholder="Fecha de inicio" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="datepicker7" placeholder="Fecha fin" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="comment" placeholder="Observación"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Gestión">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Final Modal permiso-->
    <?php 
        include '../layout/error.php';
        include '../layout/script.php';    
    ?>
</body>

</html>