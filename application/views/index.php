<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Qualis</title>

    <link rel="icon" href="<?php echo base_url('assets/img/qualis.jpg')?>">

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/materialize.css')?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?php echo base_url('assets/css/style.css')?>" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <!--
              <a id="logo-container" href="#" class="brand-logo">Qualis</a>

-->
        <img alt="Logo" class="imagen-logo" src="<?php echo base_url('assets/img/qualis.jpg')?>">

        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo site_url('Welcome/irLogin')?>">Login</a></li>
        </ul>

        <ul class="right hide-on-med-and-down">
            <li><a href="#">Publicaciones</a></li>
        </ul>

        <ul class="right hide-on-med-and-down">
            <li><a href="#">GEAB</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="<?php echo site_url('Welcome/irLogin')?>">Login</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href=""></a>Nosotros</li>
        </ul>

        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

<div class="slider">
    <ul class="slides">
        <li>
            <img src="<?php echo base_url('assets/img/calidad_aire2.jpg')?>"> <!-- random image -->
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="<?php echo base_url('assets/img/calidad_aire3.jpg')?>"> <!-- random image -->
            <div class="caption left-align">
                <h3>Nuestros Equipos</h3>
                <h5 class="light grey-text text-lighten-3">Red de equipos de ultima tecnología.</h5>
            </div>
        </li>
        <li>
            <img src="<?php echo base_url('assets/img/calidad_aire4.jpg')?>"> <!-- random image -->
            <div class="caption right-align">
                <h3>GEAB</h3>
                <h5 class="light grey-text text-lighten-3">Grupo de investigacion comprometido con el medio ambiente.</h5>
            </div>
        </li>
    </ul>
</div>

<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">

                    <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
                    <h5 class="center">Speeds up development</h5>

                    <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">group</i></h2>
                    <h5 class="center">User Experience Focused</h5>

                    <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
                    <h5 class="center">Easy to work with</h5>

                    <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h1 class="header center teal-text text-lighten-2">Parallax Template</h1>
            <div class="row center">
                <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
            </div>
            <div class="row center">
                <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
            </div>
            <br><br>

        </div>
    </div>
    <div class="parallax"><img src="<?php echo base_url('assets/img/background1.jpg')?>" alt="Unsplashed background img 1"></div>
</div>

<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 center">
                <h3><i class="mdi-content-send brown-text"></i></h3>
                <h4>Publicaciones </h4>
                <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
            </div>
        </div>

    </div>
</div>

<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="<?php echo base_url('assets/img/background2.jpg')?>" alt="Unsplashed background img 2"></div>
</div>

<div class="container">
    <div class="section">

        <div class="row">
            <div class="col s12 center">
                <h3><i class="mdi-content-send brown-text"></i></h3>
                <h4>GEAB </h4>
                <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
            </div>
        </div>

    </div>
</div>

<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="<?php echo base_url('assets/img/background3.jpg')?>" alt="Unsplashed background img 3"></div>
</div>

<footer class="page-footer teal">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">

                <h5 class="white-text">Company Bio</h5>
                <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>

            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Todos los derechos reservados.
        </div>
        <img class="upc-footer" alt="unicesar" src="<?php echo base_url('assets/img/upcLogo.png')?>">
    </div>
</footer>

<!--  Scripts-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/materialize.js')?>"></script>
<script src="<?php echo base_url('assets/js/init.js')?>"></script>
<script>
    $(document).ready(function(){
        $('.slider').slider();

    });

</script>
</body>
</html>
