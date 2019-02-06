<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Qualis</title>

    <link rel="icon" href="<?php echo base_url('assets/img/qualis.jpg')?>">
    <!-- Bootstrap core CSS-->

    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">

</head>
<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Iniciar sesión</div>
        <div class="card-body">

            <?php
            if (isset($err)){
                echo '<div class="alert alert-danger" role="alert"><b>' .
                    $err .
                    '</b></div>';
            }
            ?>

            <?php echo form_open('Welcome/login');?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuario</label>
                    <input class="form-control"
                           id="exampleInputEmail1" name="usuario"
                           type="text" aria-describedby="emailHelp"
                           placeholder="Ingrese su usuario" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input class="form-control"
                           id="exampleInputPassword1" name="password"
                           type="password"
                           placeholder="Ingrese su contraseña" required>
                </div>

                <h5>Rol</h5>
                <div class="col">
                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="rol" checked value="laboratorista"/>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Laboratorista</span>
                    </label>

                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="rol" value="coordinador"/>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Coordinador</span>
                    </label>

                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="rol" value="analista"/>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Analista de datos</span>
                    </label>
            </div>
                <button type="submit" class="btn btn-primary btn-block" href="index.html">Entrar</button>
            </form>
        </div>
    </div>
</div>

