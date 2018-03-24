
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

        <h4>Lotes</h4>
        <div class="card mb-3" style="margin-left: 10px;">
            <div class="card-header">
                <i class="fa fa-table"></i> <strong>Lotes <?php echo $nombre;?></strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Mes y año</th>
                            <th>Cantidad de filtros PST</th>
                            <th>Cantidad de filtros PM10</th>
                            <th>Cantidad de filtros PM2.5</th>
                            <th>Filtros pesados PST</th>
                            <th>Filtros pesados PM10</th>
                            <th>Filtros pesados PM2.5</th>
                            <th>Filtros instalados PST</th>
                            <th>Filtros instalados PM10</th>
                            <th>Filtros instalados PM2.5</th>
                            <th>Muestras recogidas PST</th>
                            <th>Muestras recogidas PM10</th>
                            <th>Muestras recogidas PM2.5</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($lotes->result() as $lote){
                            echo
                                '<tr>'.
                                '<td>'. $lote->mes.'</td>' .
                                '<td>'. $lote->cant_pst .
                                '<td>'. $lote->cant_pm10 .'</td>' .
                                '<td>'. $lote->cant_pm25.'</td>' .
                                '<td>'. $lote->pesadospst.
                                '<td>'. $lote->pesadospm10 .'</td>' .
                                '<td>'. $lote->pesadospm25.'</td>' .
                                '<td>'. $lote->instaladospst.
                                '<td>'. $lote->instaladospm10 .'</td>' .
                                '<td>'. $lote->instaladospm25.'</td>' .
                                '<td>'. $lote->recogidospst.'</td>' .
                                '<td>'. $lote->recogidospm10 .'</td>' .
                                '<td>'. $lote->recogidospm25 .'</td></tr>';
                        }
                        ?>
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
