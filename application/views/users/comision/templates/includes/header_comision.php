<!doctype html>
<!--[if lt IE 8 ]><html lang="en" class="no-js ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $titlepage; ?></title>
        <meta name="description" content="Sistema de Gestion de Alojamiento para Clientes en San Rafael Late">
        <meta name="author" content="Destinos Interactivos Labs">
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta Http-Equiv="Pragma-directive: no-cache">
        <meta Http-Equiv="Cache-directive: no-cache">
        <!--
        Note: this file is a variant of the main index.php file,
        just to show the markup required to use the aletrnative menu style
        See documentation for more details
        
        -->

        <!-- Global stylesheets -->
        <link href="<?php echo base_url(); ?>users/css/reset.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>users/css/common.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>users/css/form.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>users/css/standard-alt.css" rel="stylesheet" type="text/css">

        <!-- Comment/uncomment one of these files to toggle between fixed and fluid layout -->
        <link href="<?php echo base_url(); ?>users/css/960.gs.fluid.css" rel="stylesheet" type="text/css">

        <!-- Custom styles -->
        <link href="<?php echo base_url(); ?>users/css/simple-lists.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>users/css/block-lists.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>users/css/planning.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>users/css/table.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>users/css/calendars.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>users/css/wizard.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>users/css/gallery.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>js/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>imagenes/icosrl.png">

        <!-- Modernizr for support detection, all javascript libs are moved right above </body> for better performance -->
        <script src="<?php echo base_url(); ?>users/js/libs/modernizr.custom.min.js"></script>
        <?php if (isset($css)): ?>
            <?php foreach ($css as $var): ?>
                <link type="text/css" href="<?php echo base_url() . $var ?>.css" rel="stylesheet" />
            <?php endforeach ?>
        <?php endif; ?>
    </head>
    <body>

