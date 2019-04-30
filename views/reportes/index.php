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
                    <a class="nav-link" href="../vacaciones/personal">PERSONAL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../vacaciones/cargos">CARGOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../ruta">RUTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../vacaciones/unidad">UNIDAD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">SITUACION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../vacaciones/beneficio">BENEFICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">REPORTES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../vacaciones/cas">CAS</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Fin menu navegacion -->
    <!-- Tabla reportes -->
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="col-10" style="padding : 0;">
                <h5 class="text-center">REPORTES</h5>
                <div class="row mt-5">
                    <div class="col">
                        <div class="form-group text-right">
                            <a href="../../controllers/reporte.php" class="btn btn-success">
                                GENERAR EXCEL
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>Item</th>
                            <th>Nombre</th>
                            <th>CI</th>
                            <th>Cargo</th>
                            <th>Unidad y/o Area de trabajo</th>
                            <th>Situación</th>
                            <th>CAS</th>
                            <th>Goza de beneficio</th> 
                            <th>Fecha de nacimiento</th>
                            <th>Fecha de ingreso</th>
                            <th>Tiempo de servicio</th>
                            <th>Duodecimas</th>
                            <th>Saldos pendientes</th>
                            <th>Uso de vacaciones</th>
                            <th>Saldo o total sin duodecimas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require_once '../../models/Reporte.php';
                                $reportes = new Reporte();
                                $reporte = $reportes->getReporte();
                                foreach ($reporte as $fila) {
                            ?>
                                    <tr>
                                        <td><?= $fila['nro_item'] ?></td>
                                        <td><?= $fila['nombre'].' '.$fila['apellidos'] ?></td>
                                        <td><?= $fila['ci'] ?></td>
                                        <td><?= $fila['cargo'] ?></td>
                                        <td><?= $fila['nombre_unidad'] ?></td>
                                        <td><?= $fila['tipo_situacion'] ?></td>
                                        <td><?= $fila['cas'] ?></td>
                                        <td><?= 'nose  xd'?></td>
                                        <td><?= $fila['fecha_nacimiento'] ?></td>
                                        <td><?= $fila['fecha_ingreso'] ?></td>
                                        <td><?= 'calcular' ?></td>
                                        <td><?= 'calcular'?></td>
                                        <td><?= 'calcular' ?></td>
                                        <td><?= 'calcular' ?></td>
                                        <td><?= 'calcular' ?></td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Tabla reportes -->
    <?php 
        include '../layout/script.php';    
    ?>
</body>

</html>