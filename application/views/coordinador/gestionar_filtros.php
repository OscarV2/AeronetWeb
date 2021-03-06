
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
                <a class="nav-link" href="<?php echo site_url('Coordinador/irCrearProyecto');?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Nuevo Proyecto</span>
                </a>
            </li>
            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="<?php echo site_url('Coordinador/irListaProyectos');?>">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <span class="nav-link-text">Lista de proyectos</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="<?php echo site_url('Coordinador/irCrearUsuario');?>">
                    <i class="fa fa-fw fa-table"></i>
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
                <a href="<?php echo site_url('Welcome/irInicio');?>">Proyectos</a>
            </li>
            <li class="breadcrumb-item">Gestionar Filtros</li>
        </ol>
        <!-- Formulario  Gestionar filtros -->

        <h3>Nuevo Lote de filtros</h3>
        <form action="" method="post">
            <?php
            if ($usuarios->result() == NULL)
            {
                echo '<h3>No tiene laboratorios asignados.</h3>';
            }
            ?>

            <div class="form-group">
                <label for="exampleSelect1">Seleccionar Laboratorio</label>
                <select name="lab" class="form-control" id="exampleSelect1">
                    <?php
                    foreach ($usuarios->result() as $usuario)
                    {
                        echo '<option value="'. $usuario->idusuarios . '">' . $usuario->nombre . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleSelect1">Seleccionar mes</label>
                    <select name="mes" class="form-control" required>
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
                    <input type="number" name="year" min="2017" max="2020" class="form-control" id="exampleFormControlInput1" placeholder="Año" required>
                </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">PST</label>
                <input type="number" name="cant_pst" min="0" max="50" class="form-control" id="exampleFormControlInput1" placeholder="max 50 Filtros" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">PM10</label>
                <input type="number" name="cant_pm10" min="0" max="50" class="form-control" id="exampleFormControlInput2" placeholder="max 50 Filtros" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">PM2.5</label>
                <input type="number" name="cant_pm25" min="0" max="50" class="form-control" id="exampleFormControlInput3" placeholder="max 50 Filtros" required>
            </div>
            <small><b>Nota: </b>Si no desea solicitar filtros de algun tipo ingrese cero 0.</small>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><b>GUARDAR</b></button>
            </div>
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
    <div class="modal fade" id="modalAtras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lotes guardados exitosamente</h5>
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
                    <a class="btn btn-primary" href="<?php echo site_url('Welcome/cerrarSesion');?>">Cerrar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

    <script>

        $('form').on('submit', function (e) {
            e.preventDefault();
            if ($("#exampleSelect1").val() === null){
                alert("No hay laboratorios registrados.")
            }else{
                $.ajax({
                    type: 'post',
                    url: "<?php echo site_url('Filtros/nuevoLote') . '?idProyecto=' . $idProyecto;?>" ,
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
