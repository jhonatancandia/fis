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
                    <a class="nav-link" href="personal">PERSONAL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">CARGOS</a>
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
                            <th scope="col" class="text-center">NOMBRE DE CARGO</th>
                            <th scope="col" class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">12342</td>
                            <td class="text-center">Fiscal de materia lll</td>
                            <td class="text-center">
                                <a href="" title="Editar" data-toggle="modal" data-target="#modalEditar"><i class="far fa-edit"></i></a>
                                <a href="" title="Eliminar" data-toggle="tooltip" data-placement="top"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Fin Tabla de cargo -->
    <!-- Modal registrar cargo -->
    <div class="modal fade" id="modalNuevoCargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">NUEVO CARGO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="NUMERO DE ITEM" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>Elegir un cargo</option>
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
    
</div>
    <script>
            $(function () {
                $('#datetimepicker4').datetimepicker({
                    format: 'L'
                });
            });
    </script>
    <!-- Final Modal registrar cargo -->
    <!-- Modal editar cargo -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDITAR CARGO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="NUMERO DE ITEM" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>Elegir un cargo</option>
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
    
</div>
    <script>
            $(function () {
                $('#datetimepicker4').datetimepicker({
                    format: 'L'
                });
            });
    </script>
    <!-- Final Modal editar cargo -->
    <?php 
        include '../layout/script.php';    
    ?>
</body>

</html>