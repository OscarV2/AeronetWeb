
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
                <a class="nav-link" href="<?php echo site_url('Analista/inicio');?>">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <span class="nav-link-text">Inicio</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
                <a class="nav-link" href="<?php echo site_url('Analista/validar');?>">
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
                <a class="nav-link" href="<?php echo site_url('Welcome/cerrarSesion');?>">
                    <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesion</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
        <form action="<?php echo site_url('Analista/existeLote');?>" method="post" enctype="multipart/form-data">

            <?php
            if (isset($err)){
                echo '<div class="alert alert-danger" role="alert"><b>' .
                    $err .
                    '</b></div>';
            }
            ?>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Estaciones
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Estacion</th>
                                <th>Equipo</th>
                                <th>Tipo</th>
                                <th>Seleccionar</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php
                            foreach ($estaciones as $estacion){

                                echo
                                    '<tr>'.
                                    '<td>'. $estacion['nombreEstacion'].'</td>' .
                                    '<td>'. $estacion['modelo'].'<input name="idEstacion" hidden value="'.$estacion['idEstacion'].'"></td>' .
                                    '<td>'. $estacion['clase'].'<input name="clase" hidden value="'.$estacion['clase'].'"></td>' .

                                    '<td style="text-align: center;"><label class="custom-control custom-radio mb-2 mr-sm-2 mb-sm-0">' .
                                    '<input name="equipo" value="'. $estacion['idEquipo']. '" type="radio" class="custom-control-input">'.
                                    '<span class="custom-control-indicator"></span>'.
                                    '</label></td>' .
                                    '</tr>';

                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                        <label for="mesSelect">Seleccionar mes</label>
                        <select id="mesSelect" name="mes" class="form-control" required>
                            <option disabled selected>Seleccionar</option>
                            <option>Enero</option>
                            <option>Febrero</option>
                            <option>Marzo</option>
                            <option>Abril</option>
                            <option>Mayo</option>
                            <option>Junio</option>
                            <option>Julio</option>
                            <option>Agosto</option>
                            <option>Septiembre</option>
                            <option>Octubre</option>
                            <option>Noviembre</option>
                            <option>Diciembre</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="number" name="year" min="2017" max="2020" value="<?php echo date("Y"); ?>" class="form-control" id="exampleFormControlInput1" placeholder="Año" required>
                    </div>
                </div>

                <div class="col-lg-6">


<!--
                    <div class="form-group">
                        <label for="exampleInputFile">Precipitaciones del mes.</label>
                        <input type="file"
                               class="form-control-file"
                               name="precipitaciones"
                               required
                               id="exampleInputFile" aria-describedby="fileHelp" >
                        <small id="fileHelp" class="form-text text-muted">Tamaño maximo de archivo: 2M.</small>
                    </div-->
                </div>
            </div>

            <div id="pre_table" hidden class="card-mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Ingrese datos de precipitaciones.
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Fecha_muestreo</th>
                                <th>Precipitacion (mm)</th>
                            </tr>
                            </thead>
                            <tbody id="precipitaciones">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block"><strong>Continuar</strong> <i class="fa fa-arrow-right"></i></button>
        </form>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Qualis 2018</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- modal no hay fechas muestrep -->
    <div class="modal fade" id="modalFechas" tabindex="-1" role="dialog" aria-labelledby="modalFechas" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFechasLabel">Error</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">No existen muestras para el lote seleccionado.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">OK</button>
                    <a class="btn btn-primary" href="">Cerrar</a>
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
                    <a class="btn btn-primary" href="<?php echo site_url('Welcome/irInicio');?>">Cerrar</a>
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
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js')?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin.min.js')?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url('assets/js/sb-admin-datatables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/sb-admin-charts.min.js')?>"></script>
    <script>


        $("#mesSelect").change(function() {
            var optionSelected = $("option:selected", this);
            var mes = optionSelected.text();
            var year = $("input[name='year']").val();
            console.log("añiooo" + year);
            getFechasMuestreoMes(mes, year);
        });


        function verPrecipitaciones(data) {

            $('#pre_table').attr('hidden', false);
            var campoPre = $('#precipitaciones');
            
            for (var i = 0; i < data.length; i++){
                campoPre.append('<tr><td>' + data[i] +'</td>' +
                    '<td><input type="number" step="0.1" name="precipitaciones[]" value="0">' +
                    '</td>' +
                    '</tr>');
            }

        }

        function getFechasMuestreoMes(mes, year) {

            $.ajax({
                type: 'post',
                url: "<?php echo site_url('Analista/getFechasMuestreo');?>" ,
                data: {'mes' : mes,
                    'year' : year},
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data === 'Error') {
                        $('#modalFechas').modal('show');
                    }else{
                        console.log("tamaño array " + data.length);
                            verPrecipitaciones(data);
                        }
                    }
                });
        }

    </script>
</body>
</html>
