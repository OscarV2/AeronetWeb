<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Qualis</title>
    <!-- Bootstrap core CSS-->

    <link rel="icon" href="<?php echo base_url('assets/img/logo.jpg')?>">

    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer" id="page-top">

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Qualis</a>
    <h2 style="color: white;"><i class="fa fa-user"> <?php echo $_SESSION['usuarioNombre'] . ' ' . $_SESSION['usuarioApe']; ?></i></h2>

    <button class="navbar-toggler navbar-toggler-right" type="button"
            data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
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
    <div style="margin-top: 10px;" class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <?php
                if (isset($err)){
                    if ($err == 1){
                        echo ' <div class="alert alert-success" role="alert">' .
                            '<b>Filtro pesado exitosamente.</b>' .
                            '</div>';
                    }
                }
                ?>
                </div>
        </div>

        <div  class="row">

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Filtros
                        </h4>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>

                <div style="margin-top: 15px;" class="card">
                    <div class="card-header">
                        <h4>Seleccionar Lote de Filtros</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('Filtros/irLoteFiltros');?>" method="post">
                            <!-- Formulario  Gestionar filtros -->

                            <div class="form-group">
                                <select id="selectLote" name="id" class="custom-select form-control" required>
                                    <?php
                                    foreach ($lotes->result() as $lote)
                                    {
                                        echo '<option value="'. $lote->id . '">' . $lote->nombre.'</option>';
                                    }
                                    ?>
                                </select>
                                <?php
                                if ($lotes == NULL){

                                    echo '<h2>No tiene lotes disponibles</h2>';
                                }
                                ?>

                            </div>

                            <button id="btnVerLotes" type="submit" class="btn btn-primary"><i class="fa fa-eye"></i> Ver Lote</button>

                        </form>
                    </div>
                </div>

                <div style="margin-top: 15px; margin-bottom: 15px;" class="card">
                    <div class="card-header">
                        Pesar filtro Testigo
                    </div>
                    <div class="card-body">
                        <button class="btn btn-flat btn-primary" onclick="pesarFiltro()"><i class="fa fa-balance-scale"></i> Pesar</button>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Filtros
                        </h4>
                        <canvas id="singelBarChart"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="modalFiltro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesar Filtro Testigo</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formFiltroTestigo" action="<?php echo site_url('FiltroTestigo/guardarFiltros');?>">

                        <div  class="form-row">
                            <div class="form-group col-md-3">
                                <label class="control-label">Codigo:</label>
                                <input type="text" name="codigo"
                                       required class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Peso (ug):</label>
                                <input type="number" step="any" name="pesoNuevoFiltro"  class="form-control" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="control-label">Fecha:</label>
                                <input type="text" name="fechaNuevoFiltro" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
                            </div>

                        </div>

                        <div class="btn btn-primary">
                            <button style="text-align: center;"  id="btn_guardar_filtro" type="submit" class="btn btn-primary btn-lg">  Pesar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
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

    <script>

        $(document).ready(function () {
            var lotes = <?php echo json_encode($lotes->result());?>;

            if (lotes === null){
                $("#btnVerLotes").hide();
            }
        });

        var ctx = document.getElementById( "pieChart" );
        ctx.hexight = 300;
        var myChart = new Chart( ctx, {
            type: 'pie',
            data: {
                datasets: [ {
                    data: [ <?php echo $totales['pst'];?>, <?php echo $totales['pm10'];?>, <?php echo $totales['pm25'];?> ],
                    backgroundColor: [
                        "rgba(250, 223, 0,0.9)",
                        "rgba(0, 255, 25,0.7)",
                        "rgba(255, 0, 0,0.9)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(0, 123, 255,0.9)",
                        "rgba(0, 123, 255,0.7)",
                        "rgba(0, 123, 255,0.5)"
                    ]

                } ],
                labels: [
                    "pst",
                    "pm10",
                    "pm2.5"
                ]
            },
            options: {
                responsive: true
            }
        } );

        // single bar chart
        var ctx2 = document.getElementById( "singelBarChart" );
        ctx2.height = 300;
        var myBarChart = new Chart( ctx2, {
            type: 'bar',
            data: {
                labels: [ "pst", "pm10", "pm2.5" ],
                datasets: [
                    {
                        label: "blando",
                        data: [ <?php echo $totales['pst'];?>, <?php echo $totales['pm10'];?>, <?php echo $totales['pm25'];?> ],
                        borderWidth: "0",
                        backgroundColor: [
                            "rgba(250, 223, 0,0.9)",
                            "rgba(0, 255, 25,0.7)",
                            "rgba(255, 0, 0,0.9)"
                        ]
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                    } ]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                        }
                    }
                }
            }
        } );

        function pesarFiltro() {
            $('#modalFiltro').modal('show');
        }
    </script>

</div>
</body>
</html>

