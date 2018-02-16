<div id="contenedorInt">
	<div id="cont_int">
	<div id="fichasD" >
    <div id="toplinks" align="left"><b>Estas en: </b><a href="<?php echo base_url(); ?>" title="Ir a home">Home</a> >> <a href="<?php echo $urltipoE ?>"><?php echo $tipoE ?></a> >>  <a href="<?php echo base_url(). $urlback; ?>" title=" Volver a Pagina <?php echo $row_sub['SubtipoEmpresa']. " en " . $this->config->item('ciudadweb'); ?>"><?php echo $row_sub['SubtipoEmpresa']; ?> en <?php echo $this->config->item('ciudadweb'); ?></a> >><?php echo $row_Al['Empresa']; ?></div>

    <!-- TITULO FICHAS & SOCIAL MEDIA -->
    <div class="tituloSocial" align="left">
		<!-- TITULO  -->
    <div><h1 align="left"><?php echo $row_Al['Empresa']; ?></h1></div>

    <?php $direccion = "http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']; ?><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=129728918042";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--SOCIAL MEDIA --><div align="rigth">
<div id="share" align="rigth" >
  <!-- TWITTER -->
<div><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><a href="https://twitter.com/share" class="twitter-share-button" data-via="sanrafaellate" data-lang="es" data-size="" data-dnt="true"  data-count="vertical">Twittear</a>
</div>
<!-- FACEBOOK -->
<div><div class="fb-like" data-href="<?php   echo $direccion; ?>" data-send="false" data-layout="box_count" data-width="100" data-show-faces="true"></div></div>
<!--GOOGLE PLUS-->
<div><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone size="tall"></g:plusone>
</div>
</div>
</div>
	</div><!-- FICHAS INFORMARIVAS -->
	<div id="ficha_info">
<!-- GALERIA FOOTOS -->

 

       <div id="gallery" class="ad-gallery">
      <div class="ad-image-wrapper">
      </div>
   
      <div class="ad-nav">
        <div class="ad-thumbs">
          <ul class="ad-thumb-list">
            <?php $i=0; foreach ($row_img as $var) { ?>
            <li>
              <a href="<?php echo base_url()."upload/empresas/".$var['ID_Empresa']."_".$var['ImagenEmpresa'].".jpg" ?>">
                <img src="<?php echo base_url()."upload/empresas/thumb/".$var['ID_Empresa']."_".$var['ImagenEmpresa'].".jpg" ?>" <?php if ($i==0) { ?>class="image0"<?php } ?> alt="<?php echo $var['ImagenDescripcion']; ?>"> 
              </a>
            </li>
               <?php  $i++;} ?> 
          </ul>
        </div>
      </div>
    </div>

    <div id="descriptions">

    </div>
<!-- FIN GALERIA -->
<div align="left"><?php echo $row_Al['DescripcionDeta'] ?></div>
	</div>
	<!-- FICHAS DATOS -->
	<div id="ficha_datos">
		<div id="datos_alojar" class="border-Corner borde-gris " align="left">
			<h2>Datos Empresa</h2>
			<p><img src="<?php echo base_url() . "iconos/direction.png"; ?>" alt="direccion - <?php echo $row_Al['Empresa']; ?>"> <b>Direccion:</b> <?php echo $row_Al['Direccion']; ?> - <?php echo $this->config->item('ciudadweb');?> - <?php echo $this->config->item('provinciaweb');?></p>
			<p><img src="<?php echo base_url() . "iconos/phone.png"; ?>" alt=""> <b>Teleono: </b><?php echo $row_Al['Telefono']; ?></p>
			<p><img src="<?php echo base_url() . "iconos/url2.png"; ?>" alt=""> <b>Website:</b> <a href="<?php echo base_url(). "contador/empresa/web/" .$row_Al['ID_Empresa']."/?dir=".$row_Al['Web']; ?>" target="_blank" title="Vistie el Web del Alojamiento"><?php echo $row_Al['Web']; ?></a></p>
	 <div id="socialA">
  <?php 
  //FACEBOOK
    if($row_Al['Facebook']!="") {?>
<a href="<?php echo base_url().'contador/empresa/facebook/'.$row_Al['ID_Empresa']."/?dir=".$row_Al['Facebook'] ; ?>"><img src="<?php echo base_url().'iconos/fb_12.png' ?>" alt="Facebook del <?php echo $row_Al['Empresa'] ;?>  " title="ir al Facebook de <?php echo $row_Al['Empresa']  ;?>  "></a>
   <?php  } else {?>
   <img src="<?php echo base_url().'iconos/fb_1.png' ?>" alt="Facebook del <?php echo $row_Al['Empresa'] ;?>" class="opaco">
   <?php } ?>
  <?php 
  //TWITER
        if($row_Al['Twitter']!="") {?>
<a href="<?php echo base_url().'contador/empresa/twitter/'.$row_Al['ID_Empresa']."/?dir=".$row_Al['Twitter'] ; ?>"><img src="<?php echo base_url().'iconos/twitter_12.png' ?>" alt="Twitter del <?php echo $row_Al['Empresa'] ;?>"></a>
   <?php  } else {?>
  <img src="<?php echo base_url().'iconos/twitter_1.png' ?>" alt="Twitter del <?php echo $row_Al['Empresa'] ;?> " class="opaco">
   <?php } ?>
  <?php 
  //GPUS
        if($row_Al['Gplus']!="") {?>
<a href="<?php echo base_url().'contador/empresa/gplus/'.$row_Al['ID_Empresa']."/?dir=".$row_Al['Gplus'] ; ?>"><img src="<?php echo base_url().'iconos/google_plus2.png' ?>" alt="Google Plus del <?php echo $row_Al['Empresa'] ;?>"></a>
   <?php  } else {?>
   <img src="<?php echo base_url().'iconos/google_plus.png' ?>" alt="Google Plus del <?php echo $row_Al['Empresa'] ;?>" class="opaco">
   <?php } ?>
    <?php 
  //GPUS
        if($row_Al['Pinterest']!="") {?>
<a href="<?php echo base_url().'contador/empresa/pinterest/'.$row_Al['ID_Empresa']."/?dir=".$row_Al['Pinterest'] ; ?>"><img src="<?php echo base_url().'iconos/pinterest2.png' ?>" alt="Pinterest del <?php echo $row_Al['Empresa'] ;?>"></a>
   <?php  } else {?>
   <img src="<?php echo base_url().'iconos/pinterest.png' ?>" alt="Pinterest del <?php echo $row_Al['Empresa'] ;?>" class="opaco">
   <?php } ?>
    </div>
		</div>
<div class="border-Corner borde-gris" align="left" id="consultaF">  <h2>Enviar una Consulta</h2>  <form id="formA" method="post"><div id="form"  align="left" >
   <!-- <div id="loading"><img src="images/ajax-loader.gif" alt=""></div>-->
    <div><label for="name">Nombre y Apellido:</label><br/><input type="text" name="name" id="name" placeholder="Su nombre Aqui"/> </div>
    <div class="fechadiv"><label for="llegada">Llegada:</label><br/><input type="text" name="from" id="from" class="fechainput"/> </div>
    <div class="fechadiv"><label for="Salida">salida:</label><br/><input type="text" name="to" id="to" class="fechainput"/> </div>
    <div><label for="email">Email:</label><br/><input type="text" name="email" placeholder="Su email Aqui" id="email"/> </div>
    <div><label for="telefono">Telefono:</label><br/><input type="text" name="telefono" id="telefono" placeholder="Su telefono Aqui"/> </div>
    <div><label for="consulta">Consulta:</label><br/><textarea name="consulta" id="consulta" cols="20" rows="6" id="consulta" placeholder="Agregue su consulta"></textarea> </div>
    <div align="right"><button type="button" id="enviar" onclick="javascript:_gaq.push(['_trackEvent','email','ficha-e','empresas']);">Enviar</button></div>

    <input type="hidden" value="<?php echo $row_Al['ID_Empresa']; ?>" id="id" name="id">
    <input type="hidden" value="<?php if($row_Al['Mail']!=''){echo $row_Al['Mail'];} else {echo "contacto@sanrafaellate.com.ar";} ?>" id="email_A" name="email_A">
    <input type="hidden" id="tipo_ae" value="empresa">
    <input type="hidden" id="name_ae" name="name_ae" value="<?php echo $row_Al['Empresa']?>">
    <input type="hidden" id="baseurl" name="baseurl" value="<?php echo base_url(); ?>">


  </div></form> 
  </div>
    <?php if($row_Al['Web']!="") { ?><div class="border-Corner borde-gris" align="center"> 

  <img src="http://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo $row_Al['Web'] ?>&bgcolor=DCEA8E" alt="QR:  <?php echo $row_Al['Empresa'] ?>"/>
</div><?php } ?>
	</div>
		</div>
	</div>
</div>