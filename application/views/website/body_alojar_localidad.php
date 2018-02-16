 <!--
====================================
BEGUIN CONTENIDOS
====================================
--> <div id="contenedor2">
 <div align="" id="titulos">
  <div class="tituloSocial" align="left">

<!-- DIV SOCIALES --> 
<?php $direccion = "http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']; ?>
<div id="fb-root"></div>
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
<div><div class="fb-like" data-href="<?php   echo $direccion; ?>" data-send="false" data-layout="box_count" data-width="110" data-show-faces="true"></div></div>
<!--GOOGLE PLUS-->
<div><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone size="tall"></g:plusone>
</div>
</div></div>
</div>
    <div align="left">
            <h1><?php echo $titulo_p; ?></h1>
     
      <p class="estasaqui"><span class="here">Estas Aqui:</span>: <a href="<?php echo base_url(); ?>" title="Ir a home">Home</a> >> <a href="<?php echo base_url().'/alojamientos/alojamientos.html';?>" title="Alojamientos en <?php echo $this->config->item('ciudadweb');; ?>"></a> <?php echo $titulo_p; ?> -  San <?php echo $this->config->item('ciudadweb');; ?></p>
    </div>
</div>
 <div id="cont_full">
   <!-- BEGUIN CONT FULL-->
       <div id="toplinks" align="left"><b>Estas en: </b><a href="<?php echo base_url(); ?>" title="Ir a home">Home</a> >> <a href="<?php echo base_url().'/alojamientos/alojamientos.html';?>" title="Alojamientos en <?php echo $this->config->item('ciudadweb');; ?>"></a> <?php echo $titulo_p; ?> -  San <?php echo $this->config->item('ciudadweb');; ?></div>
<div class="cont_margin" >

<!--   =========================        -->
<!--    DSTACADOS              -->
<!--   =========================        -->
<?php 
if (count($tipoA)>0){

foreach ($tipoA as $var2) {
  # code...


$rowal = $this->dblistado->listadoalojar($loca,$var2['ID_TipoAlojamiento'] ,0,100);
$name_T= $var2['TipoAlojamiento'];

 ?>


<?php if (count($rowal)>0){?>
<div align="left"> <h2 class="subtipoalo"><?php echo $var2['TipoAlojamiento']; ?></h2></div>
  <div id="dir_">
     <?php foreach ($rowal as $var): ?>
     <?php
//SI NO ES PUBLI BASICA =0
   if($var['Basico']=="0"){ ?>  
  <div class="items" >
    <h3><?php echo $name_T." ".ucwords($var['Nombre']); ?></h3>
    <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1_p.jpg"; ?>" alt="<?php echo $name_T." ".ucwords($var['Nombre']); ?> <?php echo $this->config->item('ciudadweb');; ?>" class="princ">
    <div class="dir_H" align="center">
      <h3><?php echo $name_T." ".ucwords($var['Nombre']); ?></h3>
      <p><?php echo substr(strip_tags($var['Descripcion']),0,100) ?></p>
<!-- EMAIL-->
<?php if (isset($var['Email'])){ ?>
<a href="#" title="<?php echo $name_T." ".ucwords($var['Nombre']); ?>- " class="tooltip"> <img src="<?php echo base_url();?>iconos/email_F.png" alt="enviar Email " > <span><b>Haga click </b>en Icono para enviar email a este alojamiento</span>
</a>
<?php } ?>
<!-- direccion-->
<?php if (isset($var['Direccion'])){ ?>
<a href="#" title="" class="tooltip"> <img src="<?php echo base_url();?>iconos/direction2.png" alt="Direccion" > <span><?php echo ucwords($var['Direccion']); ?> -  <?php echo $this->config->item('ciudadweb');; ?></span>
</a>
<?php } ?>
<!-- TELEFONO-->
<?php if (isset($var['Telefono'])){ ?>
<a href="#" title="" class="tooltip"> <img src="<?php echo base_url();?>iconos/phone3.png" alt="Telefono" > <span><b>Telefono: </b><b class="tel"><?php echo ($var['Telefono']); ?></b></span>
</a>
<?php } ?>
<!-- URL-->
<?php if (isset($var['WebSite'])){ ?>
<a href="#" title="" class="tooltip"> <img src="<?php echo base_url();?>iconos/url.png" alt="Website" > <span>Ir al WebSite</span></a>
<?php } ?>
<br><br>
<span class="butons"><a href="<?php echo base_url().'alojamiento/'.$var['Url'] ?>" title="<?php echo $name_T." ".ucwords($var['Nombre']); ?>- <?php echo $this->config->item('ciudadweb');; ?> - Ver Ficha Informacion">Ver Ficha</a></span>
    </div>
  </div>
 <?php } 
  // PUBLICIDAD BASICA =1
   else { ?>
 <div class="itemsB" >
    <h3><?php echo $name_T." ".ucwords($var['Nombre']); ?></h3>
<!-- EMAIL-->
<?php if (isset($var['Email'])){ ?>
<a href="#" title="<?php echo $name_T." ".ucwords($var['Nombre']); ?>- <?php echo $this->config->item('ciudadweb');; ?> - Ver Ficha Informacion" class="tooltip xleft"> <img src="<?php echo base_url();?>iconos/email_F2.png" alt="" > <span><b>Haga click </b>en Icono para enviar email a este alojamiento</span>
</a>
<?php } ?>
<!-- direccion-->
<?php if (isset($var['Direccion'])){ ?>
<a href="#" title="" class="tooltip xleft"> <img src="<?php echo base_url();?>iconos/direction4.png" alt="" > <span><?php echo ucwords($var['Direccion']); ?> -  <?php echo $this->config->item('ciudadweb');; ?></span>
</a><?php } ?>
<!-- TELEFONO-->
<?php if (isset($var['Telefono'])){ ?>
<a href="#" title="" class="tooltip xright"> <img src="<?php echo base_url();?>iconos/phone2.png" alt="" > <span><b>Telefono: </b><b class="tel"><?php echo ($var['Telefono']); ?></b></span>
</a>
<?php } ?>
<!-- URL-->
<?php if (isset($var['WebSite'])){ ?>
<a href="#" title="" class="tooltip xright"> <img src="<?php echo base_url();?>iconos/url.png" alt="" > <span>Ir al WebSite</span></a>
<?php } ?>
  </div>
  <?php } ?>
  <?php endforeach ?>

</div>

<?php } 

} }  if (count($var2)==0){ echo "<p> Lo lamentamos pero no tenenmos ningun registro de <b> ". $titulo_p ."</b> </p>";}?>

</div>
<!-- FIN CONT MARGIN-->
</div>
<!-- FIN CONT FULL-->
 </div>
<!-- END CONTENEDOR-->


