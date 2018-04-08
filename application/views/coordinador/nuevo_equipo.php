
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
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
                    <a href="<?php echo site_url('Equipos/verEquiposPM10') . "?tipo=pm10" ;?>">PM10</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Equipos/verEquiposPM10') . "?tipo=pst" ;?>"">PST</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Equipos/verEquiposPM10') . "?tipo=pm2.5" ;?>"">PM2.5</a>
                </li>
            </ul>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Estaciones">
            <a class="nav-link" href="<?php echo site_url('Coordinador/irEstaciones');?>">
                <i class="fa fa-fw fa-table"></i>
                <span class="nav-link-text">Estaciones</span>
            </a>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Nuevo Equipo">
            <a class="nav-link" href="#">
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
                <a href="#">Nuevo Equipo</a>
            </li>
        </ol>

        <?php
        if (isset($err)){
            switch ($err){
                case 0:
                    echo '<div class="alert alert-danger"
                            role="alert"><b>ERROR. NO SE PUDO REALIZAR LA ACCION.</b></div>';
                    break;
                case 1:
                    echo '<div class="alert alert-success"
                            role="alert"><b>EQUIPO CREADO EXITOSAMENTE.</b></div>';
                    break;
                case 2:
                    echo '<div class="alert alert-success"
                            role="alert"><b>ESTACION CREADA EXITOSAMENTE.</b></div>';
                    break;
            }

        }
        ?>
        <div id="accordion">
            <!-- Form Nuevo Equipo -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Nuevo Equipo
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <form
                                id="formNuevoEquipo"
                              style="margin-left: 10px; margin-right: 10px"
                                action="<?php echo site_url('Equipos/crearEquipo');?>"
                                method="post"
                                enctype="multipart/form-data">

                            <div class="form-row">
                                <!-- modelo  -->
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Modelo *</label>
                                        <input type="text" name="modelo" required class="form-control">
                                    </div>
                                </div>
                                <!-- marca -->
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Marca</label>
                                        <input type="text" name="marca" class="form-control">
                                    </div>
                                </div>
                                <!-- serial -->
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Serial *</label>
                                        <input type="text" name="serial" required class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- metodo  -->
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fa fa-check"></i> Método *</label>
                                        <input type="text" name="metodo" required  class="form-control">
                                    </div>
                                </div>

                                <!-- propietario -->
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fa fa-user"></i> Propietario</label>
                                        <input type="text" name="propietario"  required class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">

                                <!-- Estacion -->
                                <div class="col">
                                        <label for="estacionSelect">Seleccionar Estacion</label>
                                        <select id="estacionSelect" name="estacion" class="form-control" required>

                                            <option disabled>Estaciones</option>
                                            <?php
                                            foreach ($estaciones->result() as $estacion){
                                                echo '<option value="'.$estacion->idestacion .'">' . $estacion->nombre . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>

                                <div class="col">
                                        <!-- variable  -->
                                        <div class="form-group label-floating">
                                            <label for="variableSelect">Variable</label>
                                            <select id="variableSelect" name="variable" class="form-control" required>

                                                <option>PM10</option>
                                                <option>PST</option>
                                                <option>PM2.5</option>

                                            </select>
                                        </div>
                                </div>

                                <div class="col">
                                        <!-- tipo -->
                                        <div class="form-group label-floating">
                                            <label for="tipoSelect">Seleccionar Tipo</label>
                                            <select id="tipoSelect" name="tipo" class="form-control" required>
                                                <option>Hi Vol</option>
                                                <option>Low Vol</option>
                                            </select>
                                        </div>
                                    </div>

                            </div>

                            <!-- foto -->
                            <div class="form-group">
                                <label for="exampleInputFile"><i class="fa fa-camera"></i> Foto.</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="foto"
                                       accept="image/*"
                                       required
                                       id="exampleInputFile" aria-describedby="fileHelp" >
                                <small id="fileHelp" class="form-text text-muted">Tamaño maximo de archivo: 2M.</small>
                            </div>

                            <div class="alert alert-info" role="alert">
                                <b><i class="fa fa-wrench"></i> Datos de Calibracion    </b>
                            </div>
                            <!-- calibracion -->
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fa fa-calendar"></i> Fecha ultima Calibración:</label>
                                        <input type="date" name="fechaCal" required  class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Pendiente curva de calibracion (m) :</label>
                                        <input type="number" maxlength="10" step="0.1" name="m" required  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Intercepto (b):</label>
                                        <input type="number" maxlength="10" step="0.1" name="b" required  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">r:</label>
                                        <input type="number" maxlength="10" step="0.1" name="r" required  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- descripcion -->
                            <div class="form-group">
                                <label for="txtDescEquipo"><i class="fa fa-comments"></i> Descripción</label>
                                <textarea name="descripcion" class="form-control" id="txtDescEquipo" rows="3"></textarea>

                            </div>

                            <div class="form-group">
                                <small><mark>Los campos marcados con (*) son obligatorios.</mark></small>

                            </div>
                            <button style="margin-top: 15px;" type="submit" class="btn btn-primary btn-lg">Guardar</button>

                        </form>

                    </div>
                </div>
            </div>

            <!-- Form Nueva Estacion -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Nueva Estación
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                     data-parent="#accordion">
                    <div class="card-body">

                        <form id="formNuevaEstacion"
                              style="margin-left: 10px; margin-right: 10px"
                              method="post"
                        action="<?php echo site_url('Estaciones/crearEstacion');?>">

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre *</label>
                                        <input type="text" name="nombreEstacion" required class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label for="tipoEstSelect"> Tipo</label>
                                        <select id="tipoEstSelect" name="tipoEst" class="form-control" required>

                                            <option>Rural</option>
                                            <option>Urbana</option>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fa fa-map-marker"></i> Longitud</label>
                                        <input type="number" maxlength="20" step="0.1" name="longitud" required  class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fa fa-map-marker"></i> Latitud</label>
                                        <input type="number" maxlength="20" step="0.1" name="latitud" required  class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fa fa-map-marker"></i> Municipio</label>
                                        <input type="text" name="municipio"  required class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <small><mark>Los campos marcados con (*) son obligatorios.</mark></small>

                            </div>

                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label"><i class="fa fa-map-marker"></i> MSNM</label>
                                    <input type="number" min="10" max="3000" name="msnm" class="form-control">
                                </div>
                            </div>

                            <button style="margin-top: 15px;" type="submit" class="btn btn-primary btn-lg">Guardar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

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
</div>

<!-- Modal-->
<div class="modal fade" id="modalSuccess"
     tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true"
     data-backdrop="static"
     data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Operacion exitosa</h5>
            </div>
            <div class="modal-body">Equipo Creado Exitosamente.</div>
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
                <a class="btn btn-primary" href="<?php echo site_url('Welcome/cerrarSesion');?>">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
<script>
/*
    $('form').on('submit', function (e) {
        e.preventDefault();

        var idForm = $(this).attr('id');

        if (idForm === 'formNuevoEquipo'){
            $.ajax({
                type: 'post',
                url: "" ,
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data) ;
                    if (data === 'success'){
                        // mostrar modal
                        $('#modalSuccess').modal('show');
                    }else{
                        alert('Error');
                    }
                }
            });
        }else if(idForm === 'formNuevaEstacion'){
            $.ajax({
                type: 'post',
                url: "" ,
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data) ;
                    if (data === 'success'){
                        // mostrar modal
                        $('#modalSuccess').modal('show');
                    }else{
                        alert('Error');
                    }
                }
            });
        }
    });
*/
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

</body>

</html>
