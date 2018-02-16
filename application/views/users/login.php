<!doctype html>
<!--[if lt IE 8 ]><html lang="en" class="no-js ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Ingreso Admin Alojamiento SAN RAFAEL LATE </title>
	<meta name="description" content="">
	<meta name="author" content="">
	
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
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>users/favicon-large.png">
	
	<!-- Modernizr for support detection, all javascript libs are moved right above </body> for better performance -->
	<script src="<?php echo base_url(); ?>users/js/libs/modernizr.custom.min.js"></script>
	<style>
.centrar {width: 100%; text-align: center; } 
.400px {width: 600px;}
	</style>
	
</head>

<!-- the 'special-page' class is only an identifier for scripts -->
<body  >
<div class="container_12 with-margin"  align="center">
	
	<div class="grid_4 prefix_4" >
<?php if (isset($errorlogin)): ?>
	

	<section id="message" class="">
		<div class="block-border"><div class="block-content no-title dark-bg">
			<p class="mini-infos">Intente de nuevo <b>Usuario</b> y/o <b>Contraseña</b> Incorrectos</p>
		</div></div>
	</section>
	<?php endif ?>
	<?php if (isset($texterror)): ?>
	

	<section id="message" class="">
		<div class="block-border"><div class="block-content no-title dark-bg">
			<p class="mini-infos"><?php echo $texterror  ?></p>
		</div></div>
	</section>
	<?php endif ?>
	<section id="login-block " > 
		<div class="block-border" ><div class="block-content">
			
			<!--
			IE7 compatibility: if you want to remove the <h1>,
			add style="zoom:1" to the above .block-content div
			-->
			<h1>Adminitrador</h1>
			<div class="block-header">SAN RAFAEL LATE <br> </div>
				
			
			
			<form class="form with-margin" name="login-form" id="login-form" method="post" action="<?php echo base_url(); ?>users/login_user/verificar">
				<input type="hidden" name="a" id="a" value="send">
				<p class="inline-small-label" align="left">
					<label for="Usuario" align="right"><span class="big">Usuario:</span></label>
					<input type="text" name="Usuario" id="Usuario" class="full-width" value="">
				</p>
				<p class="inline-small-label">
					<label for="Clave" align="right"><span class="big">Contraseña:</span></label>
					<input type="password" name="Clave" id="Clave" class="full-width" value="">
				</p>
				
				<button type="submit" class="float-right">Ingrese</button>
				<p class="input-height">
					
				</p>
			</form>
			
			<form class="form" id="password" method="post" action="<?php echo base_url()."users/login_user/recuperarpass" ?>">
				<fieldset class="grey-bg no-margin collapse">
					<legend><a href="#">Perdio su Clave?</a></legend>
					<p class="input-with-button">
						<label for="recuperarpass">ingrese su direccion de e-mail</label>
						<input type="text" name="recuperarpass" id="recuperarpass" value="" Placeholder="Escriba su Email">
						<button type="submit">enviar</button>
					</p>
				</fieldset>
			</form>
		</div></div>
	</section>
	</div>
	</div>
	<!--
	
	Updated as v1.5:
	Libs are moved here to improve performance
	
	-->
	
	<!-- Combined JS load -->
	<!-- Generic libs -->
	<script src="<?php echo base_url(); ?>users/js/libs/jquery-1.6.3.min.js"></script>
	<script src="<?php echo base_url(); ?>users/js/old-browsers.js"></script>		<!-- remove if you do not need older browsers detection -->
	<script src="<?php echo base_url(); ?>users/js/libs/jquery.hashchange.js"></script>
	
	<!-- Template libs -->
	<script src="<?php echo base_url(); ?>users/js/jquery.accessibleList.js"></script>
	<script src="<?php echo base_url(); ?>users/js/searchField.js"></script>
	<script src="<?php echo base_url(); ?>users/js/common.js"></script>
	<script src="<?php echo base_url(); ?>users/js/standard.js"></script>
	<!--[if lte IE 8]><script src="js/standard.ie.js"></script><![endif]-->
	<script src="<?php echo base_url(); ?>users/js/jquery.tip.js"></script>
	<script src="<?php echo base_url(); ?>users/	js/jquery.contextMenu.js"></script>
	
	<!--[if lte IE 8]><script src="js/standard.ie.js"></script><![endif]-->
	
	
	
</body>
</html>
