
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Inicio">
            <a class="nav-link" href="<?php echo site_url('Welcome/irInicio');?>">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Inicio</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
            <a class="nav-link" href="<?php echo site_url('Coordinador/irCrearProyecto');?>">
                <i class="fa fa-fw fa-calendar-plus-o"></i>
                <span class="nav-link-text">Nuevo Proyecto</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="nuevo Usuario">
            <a class="nav-link" href="<?php echo site_url('Coordinador/irCrearUsuario');?>">
                <i class="fa fa-fw fa-user-plus"></i>
                <span class="nav-link-text">Nuevo Usuario</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Equipos">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-wrench"></i>
                <span class="nav-link-text">Equipos</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseComponents">
                <li>
                    <a href="<?php echo site_url('Equipos/verEquiposPM10') . "?tipo=pm10" ;?>">PM10</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Equipos/verEquiposPM10') . "?tipo=pst" ;?>"">PST</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Equipos/verEquiposPM10') . "?tipo=pm2.5" ;?>"">PM2.5</a>
                </li>
            </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Estaciones">
            <a class="nav-link" href="<?php echo site_url('Coordinador/irEstaciones');?>">
                <i class="fa fa-fw fa-table"></i>
                <span class="nav-link-text">Estaciones</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuevo Equipo">
            <a class="nav-link" href="<?php echo site_url('Coordinador/irCrearEquipo');?>">
                <i class="fa fa-fw fa-calculator"></i>
                <span class="nav-link-text">Nuevo Equipo</span>
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
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo site_url('Coordinador/index');?>"></a>
            </li>
            <li class="breadcrumb-item">Asignar Estaciones</li>
        </ol>

        <h3>Asignar estaciones a <?php echo $nombre;?></h3>

        <form action="" method="post">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Estaciones sin asignar
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Estacion</th>
                                <th>Agregar</th>
                            </tr>
                            <?php
                            foreach ($estaciones->result() as $estacion){
                                echo
                                '<tr>'.
                                '<td>'. $estacion->nombre.'</td>' .
                                '<td><label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">' .
                                '<input name="estacion[]" value="'. $estacion->idestacion. '" type="checkbox" class="custom-control-input">'.
                                '<span class="custom-control-indicator"></span>'.
                                '</label></td>' .
                                '</tr>';
                            }
                            ?>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block"><strong>Guardar</strong></button>
        </form>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Qualys <?php echo date("Y"); ?></small>
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
    <script>

        $('form').on('submit', function (e) {
            var estaciones = $("input[name='estacion[]']:checked");

            e.preventDefault();
            if (estaciones.length === 0){
                alert("No ha seleccionado ninguna estacion");
            }else {
                //console.log($('form').serialize());
                $.ajax({
                    type: 'post',
                    url: "<?php echo site_url('Estaciones/gestionarEstaciones') . "?idProyecto=" . $idProyecto;?>" ,
                    data: $('form').serialize(),
                    success: function (data) {
                        console.log(data) ;
                        if (data === 'success'){
                            // mostrar modal
                            $('#modalAtras').modal('show');
                        }else{
                            alert('Error');
                        }
                    }
                });
            }
        });

    </script>
</div>
</body>

</html>

