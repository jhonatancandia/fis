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
                    <a class="nav-link" href="#">RUTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="unidad">UNIDAD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="situacion">SITUACION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">BENEFICIO</a>
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
                                <th scope="col" class="text-center">DIRECCION</th>
                                <th scope="col" class="text-center">TELEFONO</th>
                                <th scope="col" class="text-center">SITUACION</th>
                                <th scope="col" class="text-center">UNIDAD</th>
                                <th scope="col" class="text-center">FECHA INGRESO</th>
                                <th scope="col" class="text-center" width="300">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Analisa Melchoto</td>
                                <td class="text-center">Jefe del Departamento de Informática</td>
                                <td class="text-center">8033713</td>
                                <td class="text-center">Av Villazon KM 7 1/2</td>
                                <td class="text-center">70001010</td>
                                <td class="text-center">Institucional</td>
                                <td class="text-center">Quillacollo</td>
                                <td class="text-center">2019-03-14</td>
                                <td class="text-center" width="300">
                                    <a href="" title="Editar" data-toggle="modal" data-target="#modalEditarEmpleado"><i class="far fa-edit"></i></a>
                                    <a href="" title="Eliminar" data-toggle="tooltip" data-placement="top"><i class="far fa-trash-alt"></i></a>
                                    <a href="" title="Vacaciones" data-toggle="modal" data-target="#modalVacaciones"><i class="fas fa-plane"></i></a>
                                    <a href="" title="Permiso" data-toggle="modal" data-target="#modalPermiso"><i class="fas fa-procedures"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Tabla empleados -->
    <!-- Modal registrar empleado -->
    <div class="modal fade" id="modalNuevoEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">NUEVO PERSONAL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nombre(s)" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Apellido(s)" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control datepicker" placeholder="Fecha de nacimiento"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Dirección" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Telefono" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Correo electronico" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control datepicker" placeholder="Fecha de ingreso"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" required>
                        <option>Elegir un cargo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" required>
                        <option>Elegir situacion</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" required>
                        <option>Elegir unidad</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" required>
                        <option>Elegir CAS</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>    
    <!-- Final Modal registrar empleado -->
    <!-- Modal editar empleado -->
    <div class="modal fade" id="modalEditarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDITAR PERSONAL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nombre(s)" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Apellido(s)" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control datepicker" placeholder="Fecha de nacimiento"/>
                    </div>
                            <div class="form-group">
                <input type="text" class="form-control" placeholder="Dirección" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Telefono" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Correo electronico" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control datepicker" placeholder="Fecha de ingreso"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" required>
                        <option>Elegir un cargo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" required>
                        <option>Elegir situacion</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" required>
                        <option>Elegir unidad</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" required>
                        <option>Elegir CAS</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>    
    <!-- Final Modal editar empleado -->
    <!-- Modal vacaciones empleado -->
    <div class="modal fade" id="modalVacaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTRAR VACACION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control datepicker" placeholder="Fecha de inicio"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control datepicker" placeholder="Fecha fin"/>
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
    <div class="modal fade" id="modalPermiso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTRAR PERMISO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control datepicker" placeholder="Fecha de inicio"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control datepicker" placeholder="Fecha fin"/>
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
        include '../layout/script.php';    
    ?>
</body>

</html>