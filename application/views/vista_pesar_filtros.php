<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pesar Filtros</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
</head>
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
            <li class="breadcrumb-item active">Cerro Largo / Pesar Filtros</li>
        </ol>

        <section id="form_nuevo_cliente">
        <h3 class="page-title">Nuevo Filtro</h3>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group label-floating">
                        <label class="control-label">Codigo:</label>
                        <input type="text" name="codigoNuevoFiltro[]" required class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group label-floating">
                        <label class="control-label">Peso (ug):</label>
                        <input type="text" name="pesoNuevoFiltro[]" required  class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group label-floating">
                        <label class="control-label">Fecha:</label>
                        <input type="number" name="fechaNuevoFiltro[]"  required class="form-control">
                    </div>
                </div>
                <div class="demo-button">
                    <button id="btn_add_nuevo" type="button" class="btn btn-primary btn-lg"><i class="fa fa-plus-square"></i>  Agregar Filtro</button>
                </div>
            </div>

        </section>

        <div class="demo-button">
            <button id="btn_guardar_filtros" type="button" class="btn btn-primary btn-lg">  Guardar</button>
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
         <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>

    <script>

        var clientes = 0;
        $(document).ready(function () {
           setNuevoFiltro();
        });

        function setNuevoFiltro() {
            $("#btn_add_nuevo").click(function (e) {

                e.preventDefault();
                if (clientes < 10) {
                    clientes++;
                    $("#form_nuevo_cliente").append('<div class="row">' +
                        '<div class="col-md-3">' +
                        '<div class="form-group label-floating">' +
                        '<label class="control-label">Codigo:</label>' +
                        '<input type="text" name="codigoNuevoFiltro[]" class="form-control">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<div class="form-group label-floating">' +
                        '<label class="control-label">Peso:</label>' +
                        '<input type="text" name="pesoNuevoFiltro[]" class="form-control">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<div class="form-group label-floating">' +
                        '<label class="control-label">Fecha:</label>' +
                        '<input type="text" name="FechaNuevoFiltro[]" class="form-control">' +
                        '</div>' +
                        '</div>' +
                        '<br>' +
                        '<button class="remove_field btn btn-primary">Eliminar</button></p></div>'
                    );
                }
            });
            $("#form_nuevo_cliente").on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                clientes--;
            });
        }

    </script>
</div>
</body>

</html>