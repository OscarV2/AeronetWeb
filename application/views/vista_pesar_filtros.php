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
        <h3 class="page-title">Nuevo Filtro</h3>

        <form id="form_nuevo_filtros"
              action="<?php echo site_url('Filtros/guardarFiltros')  . "?idLote=" .$idLote . "&tipo=" . $tipo;?>"
              method="post"
              >

            <div class="form-row">
                <div class="form-group col-md-3">
                <label class="control-label">Codigo:</label>
                <input type="text"
                       name="codigoNuevoFiltro[]"
                       required class="form-control"
                       readonly
                       value="<?php echo strtoupper($tipo) .'-'. date('dmY'). '-' . $consecutivo?>">
                </div>
                <div class="form-group col-md-3">
                <label class="control-label">Peso (ug):</label>
                <input type="text" name="pesoNuevoFiltro[]"  class="form-control">
                </div>

                <div class="form-group col-md-3">
                <label class="control-label">Fecha:</label>
                <input type="text"
                       name="fechaNuevoFiltro[]"
                       required class="form-control"
                       readonly
                       value="<?php echo date('d-m-Y');?>">
                </div>
                <div class="demo-button btn">
                    <button id="btn_add_nuevo" type="button" class="btn btn-primary btn-lg"><i class="fa fa-plus-square"></i>  </button>
                </div>
                <div class="demo-button btn">
                    <button id="btn_eliminar"  type="button" class="remove_field btn btn-primary btn-lg"><i class="fa fa-minus-circle"></i>  </button>
                </div>
            </div>
        </form>
        <div class="btn btn-primary col">
            <button id="btn_guardar_filtros" type="submit" class="btn btn-primary btn-lg">  Guardar</button>
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
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js')?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin.min.js')?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url('assets/js/sb-admin-datatables.min.js')?>"></script>

    <script src="<?php echo base_url('assets/js/sb-admin-charts.min.js')?>"></script>
    <script>

       var clientes = 0;
        var fecha = getFecha();
        var consecutivo = parseInt(<?php echo $consecutivo?>);
        var tipo = <?php echo json_encode(strtoupper($tipo)) ;?> ;
        $(document).ready(function () {
           setNuevoFiltro();
        });

        function setNuevoFiltro() {
            $("#btn_add_nuevo").click(function (e) {

                e.preventDefault();
                if (clientes < 10) {
                    clientes++;
                    consecutivo++;

                    $("#form_nuevo_filtros").append(
                        '<div class="form-row"><div class="form-group col-md-3">' +
                        '<label class="control-label">Codigo:</label>' +
                        '<input id="txtCodigoNuevoFiltro" type="text" name="codigoNuevoFiltro[]" class="form-control" readonly value="'+ tipo + "-" + fecha + "-" + consecutivo + '">' +
                        '</div>' +
                        '<div class="form-group col-md-3">' +
                        '<label class="control-label">Peso(ug):</label>' +
                        '<input type="number" name="pesoNuevoFiltro[]" class="form-control" min="0" max="100">' +
                        '</div>' +
                        '<div class="form-group col-md-3">' +
                        '<label class="control-label">Fecha:</label>' +
                        '<input type="text" name="FechaNuevoFiltro[]" class="form-control" readonly value="'+fecha+'">' +
                        '</div>' +
                        '</div>'
                    );
                }

            });
            $("#form_nuevo_filtros").on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                console.log('holllalala');

                var filtros = $(".form-row");
                if (filtros.length > 1){
                    filtros.get(filtros.length -1).remove();
                }

                //$(".form-row").append('<h1>holaaaa</h1>');

                clientes--;
                consecutivo--;
            });
            
            function removeFiltro() {

            }
        }
        
        function getFecha() {
            var today = new Date();
            var dia = today.getDate();
            var mes = today.getMonth()+1; //Enero es 0!
            var year = today.getFullYear();
             return dia + "/" + mes + "/" + year;
        }

    </script>
    <!-- Logout Modal-->

