


<div id="tipo_galery">
	<div>
		<img src="http://farm5.staticflickr.com/4066/4536827386_3716d8809c_n.jpg" alt="Fotos en Flickr">
		<h2><a href="http://www.flickr.com//search/show/?q=paisaje+san+rafael%2C+mendoza" target="blank_" Title="Los mejores Paisajes de San Rafael en Flickr">Galeria Flickr</a></h2>
	</div>
<?php 	if(count($tiposIM)>0) { ?>
<?php foreach ($tiposIM as $var) {?>	
	<div>
		<img src="<?php echo base_url(). $var['it_thumb_upload']."1.jpg";?>" alt="Fotos  <?php echo $var['it_nombre']." ". $this->config->item('ciudadweb'); ?> ">
		<h2><a href="<?php echo base_url(). "multimedia/fotos/galeria/".  str_replace(" ", "-",$var['it_nombre']) ; ?>"  title="Ver Galeria de Fotos  <?php echo $var['it_nombre']." - ".  substr($var['it_descripcion'],0,100);?>"><?php echo $var['it_nombre'];?></a></h2>
	
	</div>
<?php } } ?>
</div>

