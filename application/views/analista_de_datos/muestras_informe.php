<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.html">Qualys</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
                <a class="nav-link" href="<?php echo site_url('Welcome/irInicio');?>">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <span class="nav-link-text">Inicio</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
                <a class="nav-link" href="<?php echo site_url('Coordinador/irCrearProyecto');?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Validar Muestras</span>
                </a>
            </li>
            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Nuevo Informe</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesion</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
        <form action="" method="post">

            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Muestras
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Fecha de muestreo</th>
                                <th>Pf inicial (Pulg HOH)</th>
                                <th>Pf final (Pulg HOH)</th>
                                <th>Pf Avg (mmHg)</th>
                                <th>Pa (mmHg)</th>
                                <th>Ta (°C)</th>
                                <th>Ta (°K)</th>
                                <th>Po/Pa</th>
                                <th>Qr (m3/min)</th>
                                <th>Qstd (m3/min)</th>
                                <th>Tiempo de operación</th>
                                <th>%DIF RFO</th>
                                <th>Vstd (m3)</th>
                                <th>Wi(g)</th>
                                <th>Wf(g)</th>
                                <th>Wn(g)</th>
                                <th>PM10 (ug/m3)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($muestras as $muestra){
                                echo
                                    '<tr>'.
                                    '<td>'. $muestra['filtro'].'</td>' .
                                    '<td>'. $muestra['fecha_muestreo'].'</td>' .
                                    '<td>'. $muestra['presion_est_inicial'].'</td>' .
                                    '<td>'. $muestra['presion_est_final'].'</td>' .
                                    '<td>'. $muestra['presion_est_avg'].'</td>' .
                                    '<td>'. $muestra['presion_amb'].'</td>' .
                                    '<td>'. $muestra['temp_ambC'].'</td>' .
                                    '<td>'. $muestra['temp_ambK'].'</td>' .
                                    '<td>'. $muestra['PoPa'].'</td>' .
                                    '<td>'. $muestra['Qr'].'</td>' .
                                    '<td>'. $muestra['Qstd'].'</td>' .
                                    '<td>'. $muestra['tiempo_operacion'].'</td>' .
                                    '<td>'. $muestra['diff_rfo'].'</td>' .
                                    '<td>'. $muestra['Vstd'].'</td>' .
                                    '<td>'. $muestra['Wi'].'</td>' .
                                    '<td>'. $muestra['Wf'].'</td>' .
                                    '<td>'. $muestra['Wn'].'</td>' .
                                    '<td>'. $muestra['variable'] .'</td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Actualizado  ayer a las 11:59 PM</div>
            </div>
        </form>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-area-chart"></i> Resultados
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablaResultados" width="100%" cellspacing="0">
                        <tbody>
                        <tr>
                            <td>Numero de datos(n)</td>
                            <td><?php echo $resultados['numDatos'];?></td>
                        </tr>
                        <tr>
                            <td>Promedio Aritmetico</td>
                            <td><?php echo $resultados['promedio'];?></td>
                        </tr>
                        <tr>
                            <td>Valor mas alto registrado(ug/m3)</td>
                            <td><?php echo $resultados['max'];?></td>
                        </tr>
                        <tr>
                            <td>Fecha de registro</td>
                            <td><?php echo $resultados['fechaMax'];?></td>
                        </tr><tr>
                            <td>Valor mas bajo registrado(ug/m3)</td>
                            <td><?php echo $resultados['min'];?></td>
                        </tr>
                        <tr>
                            <td>Fecha de registro</td>
                            <td><?php echo $resultados['fechaMin'];?></td>
                        </tr>
                        <tr>
                            <td>Desviacion estándar</td>
                            <td><?php echo $resultados['desviacion'];?></td>
                        </tr>
                        <tr>
                            <td>Parametro de Distribucion T</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Intervalo de confianza para la media (95%) u1 </td>
                            <td><?php echo $resultados['u2'];?></td>
                        </tr>
                        <tr>
                            <td>Intervalo de confianza para la media (95%) u2 </td>
                            <td><?php echo $resultados['u1'];?></td>
                        </tr>
                        <tr>
                            <td>Mediana</td>
                            <td><?php echo $resultados['mediana'];?></td>
                        </tr>
                        <tr>
                            <td>Percentil 25</td>
                            <td><?php echo $resultados['percentil25'];?></td>
                        </tr>
                        <tr>
                            <td>Percentil 75</td>
                            <td><?php echo $resultados['percentil75'];?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Qualis 2017</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- Modal Exito-->
    <div class="modal fade" id="modalAtras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estaciones asignadas exitosamente.</h5>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary"
                       href="<?php echo site_url('Welcome/irInicio');?>">Ok</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seguro quieres salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Haz click en "Cerrar" si estas seguro de terminar con la sesion actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="login.html">Cerrar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js')?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin.min.js')?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url('assets/js/sb-admin-datatables.min.js')?>"></script>

    <script src="<?php echo base_url('assets/js/sb-admin-charts.min.js')?>"></script>

</div>
</body>

</html>