
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
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Proyecto</a>
            </li>
            <li class="breadcrumb-item active">Cerro Largo</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-filter"></i>
                        </div>
                        <div class="mr-5">10 Filtros <strong>PST</strong></div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="vista_pesar_filtros.php">
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
                        <div class="mr-5">10 Filtros PM10</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="vista_pesar_filtros.php">
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
                        <div class="mr-5">20 Filtros PM2.5</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="vista_pesar_filtros.php">
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
                        <div class="mr-5">0 Filtros pesados</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="vista_pesar_filtros.php">
                        <span class="float-left">Pesar Filtros</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
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
                        <tr>
                            <td>PM10-10082015-001</td>
                            <td>PM10</td>
                            <td>12</td>
                            <td>2012/08/06</td>
                        </tr>
                        <tr>
                            <td>PM10-10082015-002</td>
                            <td>PM10</td>
                            <td>13</td>
                            <td>2010/10/14</td>
                        </tr>
                        <tr>
                            <td>PM10-10082015-003</td>
                            <td>PM10</td>
                            <td>45</td>
                            <td>2009/09/15</td>
                        </tr>
                        <tr>
                            <td>PM10-10082015-004</td>
                            <td>PM10</td>
                            <td>32</td>
                            <td>2008/12/13</td>
                        </tr>
                        <tr>
                            <td>PM10-10082015-005</td>
                            <td>PM10</td>
                            <td>23</td>
                            <td>2008/12/19</td>

                        </tr>
                        <tr>
                            <td>PM10-10082015-006</td>
                            <td>PM10</td>
                            <td>12</td>
                            <td>2013/03/03</td>
                        </tr>
                        <tr>
                            <td>PM10-10082015-007</td>
                            <td>PM10</td>
                            <td>21</td>
                            <td>2008/10/16</td>
                        </tr>
                        <tr>
                            <td>PM10-10082015-008</td>
                            <td>PM10</td>
                            <td>23</td>
                            <td>2012/12/18</td>
                        </tr>
                        <tr>
                            <td>PM10-10082015-009</td>
                            <td>PM10</td>
                            <td>32</td>
                            <td>2010/03/17</td>
                        </tr>
                        <tr>
                            <td>PM10-10082015-010</td>
                            <td>PM10</td>
                            <td>22</td>
                            <td>2012/11/27</td>
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
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

