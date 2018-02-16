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
	<!--<link href="css/960.gs.css" rel="stylesheet" type="text/css">-->
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
	
	<!-- Header -->
	
	<!-- Server status -->
	<header><div class="container_12">
		
		<p id="skin-name"><small>San Rafael Late<br> Clientes</small> <strong>1.0</strong></p>
		<div class="server-info">SOPORTE: 0260 4540127</div>
		
	</div></header>
	<!-- End server status -->
	
	<!-- Logo section -->
	<div id="header-bg">
		<img src="<?php echo base_url() ?>logo_nuevo2.png" width="auto" height="40">
	</div>
	
	<!-- Sub nav -->
	<div id="sub-nav"><div class="container_12">
		
		<ul>
			
				
			
			<li <?php if (isset($dash)){ ?> class="current" <?php } ?>><a href="<?php echo base_url(); ?>users/dash" title="Dashboard- Home Admin">Dashboard</a></li>
			<li <?php if (isset($perfil)){ ?> class="current" <?php } ?>	<li><a href="<?php echo base_url(); ?>users/dash/perfil" title="Editar su Perfil de ususario">Perfil</a></li>
			<li <?php if (isset($alojaredit)){ ?>  class="current" <?php } ?>	<li><a href="<?php echo base_url(); ?>users/dash/edit_info" title="Editar la Info de su Alojamiento">Info Alojamiento</a></li>
			<li <?php if (isset($edito) && $edito=="Servicios"){ ?>  class="current" <?php } ?>	<li><a href="<?php echo base_url(); ?>users/dash/editar/servicios/" title="Agregue o elimine Servicios a su Alojamiento">Servicios</a></li>
			<li <?php if (isset($edito) && $edito=="Fotos"){ ?>  class="current" <?php } ?>	<li><a href="<?php echo base_url(); ?>users/dash/editar/fotos/" title="agregue o elimine Fotografias de Su Alojamiento">Fotos</a></li>
                        <li <?php if (isset($edito) && $edito=="Promociones"){ ?>  class="current" <?php } ?>	<li><a href="<?php echo base_url(); ?>users/dash/editar/promociones/" title="agregue o elimine Promociones de Su Alojamiento">Promociones</a></li>
	
		
		</ul>
		
	</div></div>
	<!-- End sub nav -->
	
	<!-- Status bar -->
	<div id="status-bar"><div class="container_12">
	
		<ul id="status-infos">
			<li class="spaced">Bienvenido <strong><?php echo $Usuario.", "; ?>
<?php echo $namealojar['Nombre']; ?>
			</strong></li>
			<!-- <li>
				<a href="#" class="button" title="5 messages"><img src="images/icons/fugue/mail.png" width="16" height="16"> <strong>5</strong></a>
				<div id="messages-list" class="result-block">
					<span class="arrow"><span></span></span>
					
					<ul class="small-files-list icon-mail">
						<li>
							<a href="#"><strong>10:15</strong> Please update...<br>
							<small>From: System</small></a>
						</li>
						
					</ul>
					
					<p id="messages-info" class="result-info"><a href="#">Go to inbox &raquo;</a></p>
				</div>
			</li>-->
			
			<li><a href="<?php echo base_url() ?>users/login_user/salir" class="button red" title="Logout"><span class="smaller">SALIR</span></a></li>
		</ul>
		
		<!-- v1.5: you can now add class red to the breadcrumb -->
		<ul id="breadcrumb">
		
			<li><a href="<?php echo base_url(); ?>users/dash" title="Dashboard">Dashboard</a></li>
			<?php if (isset($edito)): ?>
							<li><a href="#" title="<?php echo $edito ?>"><?php echo $edito ?></a></li>

			<?php endif ?>
			<?php if (isset($perfil)): ?>
							<li><a href="#" title="Su Perfil de Cliente">Perfil</a></li>

			<?php endif ?>
			<?php if (isset($Descripcion)): ?>
							<li><a href="#" title="Editar Alojamiento">Editar Alojamiento</a></li>

			<?php endif ?>
		</ul>
	
	</div></div>
	<!-- End status bar -->
	
	<div id="header-shadow"></div>
	<!-- End header -->
	
