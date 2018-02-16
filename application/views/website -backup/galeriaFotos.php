


<div id="galeria_light">
<?php foreach ($Fgaleria as $var) {?>	
	<div><a href="<?php echo base_url(). $var['it_gral_upload']."/".$var['im_id_imagen'].".jpg";?>" rel="gallery1" class="galerias" title="<?php echo $var['im_descripcion']; ?>">
		<img src="<?php echo base_url(). $var['it_thumb_upload']."/".$var['im_id_imagen'].".jpg";?>" alt="<?php echo $var['im_descripcion']; ?> ">
		</a>
	</div>
<?php } ?>
</div>

