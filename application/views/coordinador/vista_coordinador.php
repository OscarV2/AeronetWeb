
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
                <a href="<?php echo site_url('Coordinador/index');?>">Proyectos</a>
            </li>
        </ol>

        <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> <strong>Proyectos Creados</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Duracion (meses)</th>
                                <th>Fecha de Inicio</th>
                                <th>Estaciones</th>
                                <th>Menu</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(sizeof($proyectos)>0){

                            foreach($proyectos as $proyecto ) {

                                echo '<tr><td>' .$proyecto['nombre'] . '</td>' .
                                    '<td>'. $proyecto['duracion'] . '</td>' .
                                    '<td>'. $proyecto['fechaInicio'] . '</td>' .
                                    '<td>'. $proyecto['estaciones'] . '</td>' .
                                    '<td><div class="dropdown">' .
                                    ' <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                                      'Opciones' .
                                     '</button>' .
                                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">' .
                                     '<a class="dropdown-item" href="'. site_url('Estaciones/irAsignarEstaciones')  . "?id=" .$proyecto['idProyecto'] . "&nombre=" .$proyecto['nombre'] .'">Asignar Estaciones</a>' .
                                     '<a class="dropdown-item" href="'. site_url('Usuarios/irGestionarFiltros')  . "?id=" .$proyecto['idProyecto']  . "&nombre=" .$proyecto['nombre'] .'" >Gestionar Filtros</a>' .
                                     '<a class="dropdown-item" href="'. site_url('LoteFiltros/irMenuLotes')  . "?id=" .$proyecto['idProyecto']  . "&nombre=" .$proyecto['nombre'] .'">Asignar Filtros</a>' .
                                     '<a class="dropdown-item" href="'. site_url('LoteFiltros/irVerLotesProyecto')  . "?id=" .$proyecto['idProyecto']  . "&nombre=" .$proyecto['nombre'] .'">Ver Lotes</a>' .
                                     '<a class="dropdown-item" href="'. site_url('Equipos/verFiltrosAsignados')  . "?id=" .$proyecto['idProyecto']  . "&nombre=" .$proyecto['nombre'] .'">Ver Equipos</a>' .

                                    ' </div>' .
'</div></td>' .
                                    '</tr>';

                            } }?>
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
                <small>Copyright © Qualis <?php echo date("Y"); ?></small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
