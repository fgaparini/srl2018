<!DOCTYPE html>
<html lang="en">
<head>
<title>No se encontro Pagina</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/error.css" />
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>imagenes/icosrl.png"/>

</head>
<body>
	<?php $imgran = rand(1,4); ?>
	<div id="error"><img src="<?php echo base_url(); ?>logo_nuevo2.png" alt="">
		<h1> Lo sentimos, no hemos encontrado la pagina!</h1>
		<p>Esta pagina ya no existe o es incorrecta.. te invitamos a seguir navegando por nuestro site. <a href="<?php echo base_url(); ?>">Ir a home </a></p>
	</div>
	<div id="fondo">
		<img src="<?php echo base_url()."imagenes/error/".$imgran ;?>.jpg" alt="">
	</div>
</body>
</html>