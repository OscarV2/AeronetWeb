
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
            <a class="nav-link" href="<?php echo site_url('Analista/inicio');?>">
                <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Inicio</span>
            </a>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
            <a class="nav-link" href="#">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Validar Muestras</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
            <a class="nav-link" href="<?php echo site_url('Analista/estaciones');?>">
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
            <a class="nav-link" href="<?php echo site_url('Welcome/cerrarSesion');?>">
                <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesion</a>
        </li>
    </ul>
</div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">

        <?php
        if (isset($err)){
            echo '<div class="alert alert-danger" role="alert"><b>' .
                'Señor  Analista debe validar/invalidar todas lsa muestras parqa con' .
                '</b></div>';
        }
        ?>

        <form method="post">
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
                                <th>Validar</th>
                                <th>Invalidar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($muestras)){
                                foreach ($muestras as $muestra){
                                    echo
                                        '<tr>'.
                                        '<td class="tabla-muestras"><b>'. $muestra['identificador'] .'</b></td>' .
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
                                        '<td>'. $muestra['variable'].'</td>' .
                                        '<td>'.
                                        '<label  class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">' .
                                        '<input id="1'.$muestra['idFiltros'].'" name="validas[]" value="'.$muestra['idFiltros'].'" type="checkbox" class="custom-control-input">'.
                                        '<span class="custom-control-indicator"></span></label>'.
                                        '</td>' .
                                        '<td>'  .
                                        '<label  class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">' .
                                        '<input id="2'.$muestra['idFiltros'].'" name="invalidas[]" value="'.$muestra['idFiltros'].'" type="checkbox" class="custom-control-input">'.
                                        '<span class="custom-control-indicator"></span></label>'.
                                        '</td>' .
                                        '</tr>';
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button style="margin-top: 15px;" type="submit" class="btn btn-primary btn-lg">Guardar</button>
        </form>

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

    <!-- Logout Modal-->
    <div class="modal fade" id="modalMuestras" tabindex="-1" role="dialog" aria-labelledby="modalMuestras" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Muestras Validadas exitosamente.</h5>
                </div>
                <div class="modal-body">Haz click en "Cerrar" si estas seguro de terminar con la sesion actual.</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="<?php echo site_url('Analista/inicio');?>">OK</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js')?>"></script>

<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js')?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin.min.js')?>"></script>
<!-- Custom scripts for this page-->
<script src="<?php echo base_url('assets/js/sb-admin-datatables.min.js')?>"></script>
<script>
    $(":checkbox").on("click",function () {
        var id = $(this).attr('id');

        var first = id.charAt(0);
        var second;

        if (first === '1'){

            second = '2';
        }else if(first === '2'){

            second = '1';
        }

        var a = id.slice(1, id.length);

        var idNext = second + a;

        $('#' +idNext).prop('checked', false);

    });

    $('form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo site_url('Analista/validarMuestras');?>" ,
            data: $('form').serialize(),
            success: function (data) {
                console.log(data) ;
                if (data === 'success'){
                    // mostrar modal
                    $('#modalMuestras').modal('show');
                }else{
                    alert('Error.');
                }
            }
        });
    });

</script>

</body>

</html>
