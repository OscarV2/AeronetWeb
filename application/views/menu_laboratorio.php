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

        <form action="<?php echo site_url('Filtros/irLoteFiltros');?>" method="post">
            <!-- Formulario  Gestionar filtros -->

            <div class="form-group">
            <label for=""></label>
            <select id="exampleFormControlInput1" name="id" class="custom-select form-control" required>
                <option selected disabled>Seleccionar Lote de Filtros</option>
                <?php
                foreach ($lotes->result() as $lote)
                {
                    echo '<option value="'. $lote->id . '">' . $lote->mes . $lote->id.'</option>';
                }
                ?>
            </select>
            </div>

            <button type="submit" class="btn btn-primary">Ver Lote</button>

        </form>

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

