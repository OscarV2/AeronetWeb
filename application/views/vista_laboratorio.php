
<body class="fixed-nav">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Qualys</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Buscar Filtro...">
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
<div>
    <div class="container-fluid">
        <!-- Icon Cards-->
        <div class="row" style="margin-top:10px">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-filter"></i>
                        </div>
                        <div class="mr-5"><?php echo $cant_pst;?> Filtros <strong>PST</strong></div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1"
                       href="<?php echo site_url('Filtros/irPesarFiltros')  . "?idLote=" .$idLote . "&tipo=pst" . "&consecutivo=". $cant_pst ;?>">
                        <span class="float-left">Pesar Filtros</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-filter"></i>
                        </div>
                        <div class="mr-5"><?php echo $cant_pm10;?> Filtros PM10</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('Filtros/irPesarFiltros')  . "?idLote=" .$idLote . "&tipo=pm10" . "&consecutivo=". $cant_pm10;?>">
                        <span class="float-left">Pesar Filtros</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-filter"></i>
                        </div>
                        <div class="mr-5"><?php echo $cant_pm25;?> Filtros PM2.5</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1"
                       href="<?php echo site_url('Filtros/irPesarFiltros')  . "?idLote=" .$idLote . "&tipo=pm25" . "&consecutivo=". $cant_pm25;?>">
                        <span class="float-left">Pesar Filtros</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-filter"></i>
                        </div>
                        <div class="mr-5"><?php echo $cant_Total;?> Filtros pesados</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1">
                        <span class="float-left"></span>
                        <span class="float-right">
                        <i class="fa"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Filtros pesados
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Variable</th>
                            <th>Peso (ug)</th>
                            <th>Fecha de pesado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($filtrosPesados->result() as $filtro){
                            echo
                                '<tr>'.
                                '<td>'. $filtro->identificador.'</td>' .
                                '<td>'. $filtro->tipo .
                                '<td>'. $filtro->pesoInicial .'</td>' .
                                '<td>'. $filtro->pesado .'</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Actualizado  ayer a las 11:59 PM</div>
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

