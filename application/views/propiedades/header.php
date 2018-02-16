
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title><?php echo $titulo ?></title>
    <meta name="description" content="<?php echo $descripcion ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="DGB Creative">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?php echo base_url() ?>propiedades-asset/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo base_url() ?>propiedades-asset/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>propiedades-asset/css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>propiedades-asset/css/chosen.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>propiedades-asset/css/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>propiedades-asset/css/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>propiedades-asset/css/realia-blue.css" type="text/css" id="color-variant-default">
 <?php if ($page=="detalle"): ?>
          <?php echo $map['js']; ?>
        <?php endif ?>  

</head>
<body>
    <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url() ?>">
<div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
            <!-- BREADCRUMB -->
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <ul class="breadcrumb pull-left">
                                <li></li>
                            </ul><!-- /.breadcrumb -->

                            <div class="account pull-right">
                                <ul class="nav nav-pills">
                                    <li><a href="<?php echo base_url() ?>propiedadessrl/login_prop">Ingresar</a></li>
                                 
                                </ul>
                            </div>
                        </div><!-- /.span12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.breadcrumb-wrapper -->

            <!-- HEADER -->
            <div id="header-wrapper">
                <div id="header">
                    <div id="header-inner">
                        <div class="container">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="row">
                                        <div class="logo-wrapper span4">
                                            <a href="#nav" class="hidden-desktop" id="btn-nav">Toggle navigation</a>

                                            <div class="logo">
                                                <a href="<?php echo base_url()."propiedadessrl/home" ?>" title="Home">
                                                    <img src="<?php echo base_url() ?>propiedades-asset/img/logo.png" alt="Home">
                                                </a>
                                            </div><!-- /.logo -->

                                            <div class="site-name">
                                                <a href="<?php echo base_url() ?>propiedadessrl/home" title="Home" class="brand">Propiedades
                                          SRL</a>
                                            </div><!-- /.site-name -->

                                            <div class="site-slogan">
                                                <span>Una Casa..<br>Una Vida</span>
                                            </div><!-- /.site-slogan -->
                                        </div><!-- /.logo-wrapper -->

                                        <div class="info">
                                           <!--  <div class="site-email">
                                                <a href="mailto:info@byaviators.com">info@byaviators.com</a>
                                            </div>
                                             -->

                                            <!-- <div class="site-phone">
                                                <span>333-666-777</span>
                                            </div> -->
                                        </div><!-- /.info -->

                                        <a class="btn btn-primary btn-large list-your-property arrow-right" href="<?php echo base_url()."propiedadessrl/publica" ?>" onclick="_gaq.push(['_trackEvent','publicar','home','propiedades']);">Publica Gratis!!</a>
                                    </div><!-- /.row -->
                                </div><!-- /.navbar-inner -->
                            </div><!-- /.navbar -->
                        </div><!-- /.container -->
                    </div><!-- /#header-inner -->
                </div><!-- /#header -->
            </div><!-- /#header-wrapper -->

            <!-- NAVIGATION -->
            <div id="navigation">
                <div class="container">
                    <div class="navigation-wrapper">
                        <div class="navigation clearfix-normal">

                            <ul class="nav">
                                <li class="active">
                                    <a href="<?php echo base_url() ?>propiedadessrl/home">Home</a>
                           
                                   
                                </li>
                                <li class="menuparent">
                                    <span class="menuparent nolink">Propiedades</span>
                                    <ul>
                                        <?php foreach ($TipoProp as $var):?>
                                        <li><a href="<?php echo base_url()."propiedadessrl/listado/".$var['TipoPropiedades'] ?>"><?php echo $var['TipoPropiedades'] ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </li>
                                <li class="menuparent">
                                    <span class="menuparent nolink">Operacion</span>
                                    <ul>
                                        <li><a href="<?php echo base_url()."propiedadessrl/listado/venta"?>">Comprar</a></li>
                                        <li><a href="<?php echo base_url()."propiedadessrl/listado/alquiler"?>">Alquilar</a></li>
                                        
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="<?php echo base_url()."propiedadessrl/publica" ?>">Publicar!</a>
                                    
                                </li>
                                <li><a href="<?php echo base_url()."propiedadessrl/contacto" ?>">Contactenos</a></li>
                            </ul><!-- /.nav -->

                 

                            <!-- /.site-search -->
                        </div><!-- /.navigation -->
                    </div><!-- /.navigation-wrapper -->
                </div><!-- /.container -->
            </div><!-- /.navigation -->