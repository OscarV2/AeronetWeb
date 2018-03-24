
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
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
            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="<?php echo site_url('Coordinador/irCrearUsuario');?>">
                    <i class="fa fa-fw fa-user-plus"></i>
                    <span class="nav-link-text">Nuevo Usuario</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Equipos</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="lista-equipos.php">PM10</a>
                    </li>
                    <li>
                        <a href="lista-equipos.php">PST</a>

                    </li>
                    <li>
                        <a href="lista-equipos.php">PM2.5</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Estaciones">
                <a class="nav-link" href="<?php echo site_url('Coordinador/irEstaciones');?>">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Estaciones</span>
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
                <a href="<?php echo site_url('Coordinador/index');?>">Proyectos</a>
            </li>
            <li class="breadcrumb-item">Nuevo usuario</li>
        </ol>
        <div class="row">

            <form class="form-control"
                  style="margin-left: 10px; margin-right: 10px"
                  method="post">

            <div class="form-row">
            <div class="col">
        <div class="form-group label-floating">
            <label class="control-label">Nombres</label>
            <input type="text" name="nombre" required class="form-control">
        </div>
    </div>
            <div class="col">
        <div class="form-group label-floating">
            <label class="control-label">Apellidos</label>
            <input type="text" name="apellidos" required class="form-control">
        </div>
    </div>
            </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group label-floating">
                            <label class="control-label">Cedula</label>
                            <input type="number" name="password" required  class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group label-floating">
                            <label class="control-label">Correo</label>
                            <input type="email" name="correo"  required class="form-control">
                        </div>
                    </div>
                </div>

            <div class="col-md-3">
                <div class="form-group label-floating">
                    <label class="control-label">Telefono</label>
                    <input type="number" name="telefono" class="form-control">
                </div>
            </div>

            <h4>Rol</h4>
            <div class="col">

                <label class="custom-control custom-radio mb-2 mr-sm-2 mb-sm-0">
                        <input type="radio" class="custom-control-input" name="rol" checked value="laboratorista"/>
                        Laboratorista
                        <span class="custom-control-indicator"></span>
                    </label>

                <label class="custom-control custom-radio mb-2 mr-sm-2 mb-sm-0">
                    <input type="radio" class="custom-control-input" name="rol" value="campo"/>
                    Campo
                    <span class="custom-control-indicator"></span>
                </label>

                <label class="custom-control custom-radio mb-2 mr-sm-2 mb-sm-0">
                    <input type="radio" class="custom-control-input" name="rol" value="analista"/>
                    Analista de datos
                    <span class="custom-control-indicator"></span>
                </label>

            </div>
                <button style="margin-top: 15px;" type="submit" class="btn btn-primary btn-lg">Guardar</button>

            </form>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Qualys 2017</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Modal-->
    <div class="modal fade" id="modalNuevoUsuario"
         tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true"
         data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                </div>
                <div class="modal-body">Usuario Registrado Exitosamente.</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="<?php echo site_url('Welcome/irInicio');?>">OK</a>
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

    <script>

        $('form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "<?php echo site_url('Usuarios/nuevoUsuario');?>" ,
                data: $('form').serialize(),
                success: function (data) {
                    console.log(data) ;
                    if (data === 'success'){
                        // mostrar modal
                        $('#modalNuevoUsuario').modal('show');
                    }else{
                        alert('Error');
                    }
                }
            });
        });

    </script>

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
