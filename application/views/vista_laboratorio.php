
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
                        <div class="mr-5"><?php echo $FppPST;?> Filtros <strong>PST</strong></div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1"
                       href="<?php echo site_url('Filtros/irPesarFiltros')  . "?idLote=" .$idLote . "&tipo=pst" . "&consecutivo=". $consePST ."&max=".$maxPST ."&filtrosporpesar=". $FppPST;?>">
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
                        <div class="mr-5"><?php echo $FppPM10;?> Filtros <strong>PM10</strong> </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('Filtros/irPesarFiltros')  . "?idLote=" .$idLote . "&tipo=pm10" . "&consecutivo=". $consePM10."&max=".$maxPM10 ."&filtrosporpesar=". $FppPM10;?>">
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
                        <div class="mr-5"><?php echo $FppPM25;?> Filtros <strong>PM2.5</strong></div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1"
                       href="<?php echo site_url('Filtros/irPesarFiltros')  . "?idLote=" .$idLote . "&tipo=pm25" . "&consecutivo=". $consePM25 ."&max=".$maxPM25 ."&filtrosporpesar=". $FppPM25;?>">
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
                        <div class="mr-5"><?php echo $filtrosPesados;?> Filtros pesados</div>
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
                            <th>Peso Inicial(ug)</th>
                            <th>Peso Final(ug)</th>
                            <th>Fecha de pesado Inicial</th>
                            <th>Fecha de pesado Final</th>
                            <?php if ($filtrosPorPesarUltimaVez){
                                echo '<th>Pesar:</th>';
                            }?>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($filtrosTodos->result() as $filtro){
                            $pesar =  (($filtro->recogido == NULL));
                            $pesado = ($filtro->pesoFinal > 0);
                            echo
                                '<tr>'.
                                '<td>'. $filtro->identificador.'</td>' .
                                '<td style="text-align: center;">'. $filtro->tipo .
                                '<td style="text-align: center;">'. $filtro->pesoInicial .'</td>' .
                                '<td style="text-align: center;">'. $filtro->pesoFinal .'</td>' .
                                '<td style="text-align: center;">'. $filtro->pesado .'</td>' .
                                '<td style="text-align: center;">'. $filtro->pesadoFinal .'</td>' ;
                            if ($pesar){
                                echo '<td>Función no disponible.</td></tr>' ;
                            }else if ($pesado){

                            }
                            else{
                                echo '<td><form id="form'.$filtro->idFiltros.'" method="post">' .
                                    '<input class="form-control-sm" type="number" min="0.1" max="50" step="any" name="pesoFinal">'.
                                    '<input hidden name="id" value="'.$filtro->idFiltros.'">'.
                                    '<input hidden name="fecha" value="'.date('d/m/Y').'">'.
                                    '<button style="margin: 5px;" type="submit" class="btn btn-primary btn-sm">Guardar</button>'.
                                '</form></td></tr>' ;
                            }
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
    <!--  Modal filtro pesado -->
    <div class="modal fade" id="modalAtras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filtro pesado exitosamente.</h5>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="#" data-dismiss="modal">Ok</a>
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
    <?php //echo base_url('Filtros/pesarFiltroFinal');?>
    <script>
        $(document).ready(function(){
            $('#modalAtras').on('hidden.bs.modal', function () {
                location.reload();
            });
        });

        $('form').on('submit', function (e) {

            e.preventDefault();
            var user_id = $(this).attr('id');
            //console.log('datos unico form' + $('#' +user_id).serialize());

                //console.log($('form').serialize());
                $.ajax({
                    type: 'post',
                    url: "<?php echo site_url('Filtros/pesarFiltroFinal');?>" ,
                    data: $('#' +user_id).serialize(),
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
        });

    </script>
</div>
</body>

</html>

