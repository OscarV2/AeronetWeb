
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
    <a class="navbar-brand" href="#">Qualis</a>
    <h4 style="color: white;"><i class="fa fa-user"> <?php echo $_SESSION['usuarioNombre'] . ' ' . $_SESSION['usuarioApe']; ?></i></h4>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>