<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Qualys</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <link href="../../css/custom-style.css" rel="stylesheet">

</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Qualys</a>
    <a class="navbar-brand" href="#">Oscar Vega</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
                <a class="nav-link" href="nuevo_proyecto.php">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Nuevo Proyecto</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="lista-proyectos.php">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <span class="nav-link-text">Lista de proyectos</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="nuevo_usuario.php">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Nuevo Usuario</span>
                </a>
            </li>
            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Equipos">
                <a class="nav-link nav-link-collapse" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Equipos</span>
                </a>
                <ul class="sidenav-second-level" id="collapseComponents">
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
                <a class="nav-link" href="estaciones.php">
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
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all alerts</a>
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
                <a href="index.html">Proyectos</a>
            </li>
            <li class="breadcrumb-item">Equipos</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Equipos
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Variable</th>
                            <th>Tipo</th>
                            <th>Propietario</th>
                            <th>Detalles</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>CORP-001</td>
                            <td>PM10</td>
                            <td>Low-Vol</td>
                            <td>DRUMMOND</td>
                            <td><button data-toggle="modal" data-target="#detallesModal " type="button" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></button></td>
                        </tr>
                        <tr>
                            <td>CORP-002</td>
                            <td>PM10</td>
                            <td>Low-Vol</td>
                            <td>DRUMMOND</td>
                            <td><button type="button" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></button></td>
                        </tr>
                        <tr>
                            <td>CORP-003</td>
                            <td>PM10</td>
                            <td>Low-Vol</td>
                            <td>DRUMMOND</td>
                            <td><button type="button" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></button></td>
                        </tr>
                        <tr>
                            <td>CORP-004</td>
                            <td>PST</td>
                            <td>High-Vol</td>
                            <td>Corpocesar</td>
                            <td><button type="button" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></button></td>
                        </tr>
                        <tr>
                            <td>CORP-005</td>
                            <td>PST</td>
                            <td>Automatico</td>
                            <td>Prodeco</td>
                            <td><button type="button" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></button></td>
                        </tr>
                        <tr>
                            <td>CORP-006</td>
                            <td>PM2.5</td>
                            <td>Low-Vol</td>
                            <td>Prodeco</td>
                            <td><button type="button" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></button></td>
                        </tr>
                        <tr>
                            <td>CORP-007</td>
                            <td>PM10</td>
                            <td>Low-Vol</td>
                            <td>DRUMMOND</td>
                            <td><button type="button" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></button></td>
                        </tr>
                        <tr>
                            <td>CORP-008</td>
                            <td>PM10</td>
                            <td>Low-Vol</td>
                            <td>DRUMMOND</td>
                            <td><button type="button" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></button></td>
                        </tr>
                        <tr>
                            <td>CORP-009</td>
                            <td>PM10</td>
                            <td>Low-Vol</td>
                            <td>DRUMMOND</td>
                            <td><button type="button" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></button></td>
                        </tr>
                        <tr>
                            <td>CORP-010</td>
                            <td>PM2.5</td>
                            <td>Low-Vol</td>
                            <td>Corpocesar</td>
                            <td><button type="button" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></button></td>
                        </tr>
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
    <div class="modal fade" id="detallesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detallesModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mb-3">
                    <img class="card-img-top" src="../../img/PST.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">CORP-001</h4>
                        <p class="card-text"><strong>Descripcion: </strong> Equipo de bajo volumen para determinacion de PM10</p>
                        <p class="card-text"><strong>Marca:  </strong>PQ100</p>
                        <p class="card-text"><strong>Serial: </strong>1287-065</p>
                        <p class="card-text"><strong>Modelo: </strong>TE-5170-V</p>
                        <p class="card-text"><strong>Localizacion: </strong>ZM02- La Jagua de Ibirico</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="#">Cerrar</a>
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
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>
</div>
</body>
</html>