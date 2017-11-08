
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.html">Qualys</a>
    <a class="navbar-brand" href="../index.html">Oscar Vega</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
                <a class="nav-link" href="<?php echo site_url('Coordinador/irCrearProyecto');?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Nuevo Proyecto</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="ListaProyectos">
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
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Equipos</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="../navbar.html">PM10</a>
                    </li>
                    <li>
                        <a href="../cards.html">PST</a>

                    </li>
                    <li>
                        <a href="../cards.html">PM2.5</a>
                    </li>
                </ul>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Estaciones">
                <a class="nav-link" href="<?php echo site_url('Coordinador/irEstaciones');?>">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Estaciones</span>
                </a>
            </li>

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

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Alertas
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
                    <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Alertas recientes:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>William ha pesado 20 filtros</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">William peso filtros PST</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Johnny instalo filtros</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">Johnny instalo filtros en Coluvion</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Maria recogió muestras</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">Maria recogio filtros instalados en Coluvion.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">Ver todas</a>
                </div>
            </li>
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Buscar Proyecto...">
                        <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
            </li>
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
        </ol>
        <div class="row">
                <!--Cargar equipos de estaciones asignadas -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Estacion</th>
                                <th>Equipo</th>
                                <th>Clase</th>
                                <th>Descripcion</th>
                                <th>Filtro</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($equipos != NULL){
                                foreach ($equipos as $equipo){
                                    echo
                                        '<tr>'.
                                        '<td>'. $equipo['estacion'].'</td>' .
                                        '<td>'. $equipo['codigo'] .
                                        '<input name="idEquipos[]" hidden value="'.$equipo['id'].'"></td>' .
                                        '<td>'. $equipo['clase'] .'</td>' .
                                        '<td>'. $equipo['descripcion'] .'</td>' .
                                        '<td>'. $equipo['filtro']->identificador .'</td></tr>';
                                }

                            }else {
                                echo '<h2>EL PROYECTO NO CUENTA CON FILTROS ASIGNADOS A EQUIPOS</h2>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Cargar filtros de lote seleccionado -->
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

