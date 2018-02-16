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
            <h1><?php echo $titulo_E; ?></h1>
     
      <p class="estasaqui"><span class="here">Estas Aqui:</span>: <a href="<?php echo base_url(); ?>" title="Ir a home">Home</a> >> <a href="<?php echo base_url().'servicios/'.$TipoEmpresa['TipoEmpresa'];?>" title="<?php echo $TipoEmpresa['TituloEmpresa']; ?>"> <?php echo $TipoEmpresa['TituloEmpresa']; ?></a> >> <?php echo $subtipo['TituloSubEmpresa'] ?></a></p>
    </div>
</div>
 <div id="cont_full">
   <!-- BEGUIN CONT FULL-->


<!--   =========================        -->
<!--    DSTACADOS              -->
<!--   =========================        -->

<?php if ($empresasltotal>0){?>
  <div id="dir_" align="left">


    <?php foreach ($empresaslist as $var):
//MUESTRO SEGUN SUBTIPO EMPRESA
     ?>
        
     <?php
//SI NO ES PUBLI BASICA =0
   if($var['Basico']=="0"){ ?>  
  <div class="items" itemscope itemtype="http://schema.org/LodgingBusiness">
   <a href="<?php echo base_url()."servicios/". $TipoEmpresa['TipoEmpresa']."/".$dirsubt."/". $var['Url'] ?>" title="<?php echo ucwords($var['Empresa']); ?>- <?php echo $this->config->item('ciudadweb');; ?> - Ver Ficha Informacion">

    <img src="<?php echo base_url() . "upload/empresas/thumb/" . $var['ID_Empresa'] . "_1_p.jpg"; ?>" alt="<?php echo ucwords($var['Empresa']); ?> <?php echo $this->config->item('ciudadweb');; ?>" class="princ" itemprop="image">
   <h3 itemprop="name"><?php echo ucwords($var['Empresa']); ?></h3>

    <p><?php echo substr(strip_tags($var['Descripcion']),0,100) ?></p>
  </a>
    <!-- EMAIL-->
<?php if (isset($var['Mail'])){ ?>
<a href="<?php echo base_url()."form_list.php?id=".$var['ID_Empresa']."&email=".$var["Mail"]."&bu=".base_url()."&tipo_ae=empresa&name_ae=".$var['Empresa'];?>" title="<?php echo ucwords($var['Empresa']); ?>- " class="tooltip femail"> <img src="<?php echo base_url();?>iconos/email_f2.png" alt="enviar Email " > <span><b>Haga click </b>en Icono para enviar email a este alojamiento</span>
</a>
<?php } ?>
<?php if (isset($var['Direccion'])){ ?>
<a href="#" title="" class="tooltip"> <img src="<?php echo base_url();?>iconos/direction4.png" alt="Direccion" > <span><?php echo ucwords($var['Direccion']); ?> -  <?php echo $this->config->item('ciudadweb');; ?></span>
</a>
<?php } ?>
<!-- TELEFONO-->
<?php if (isset($var['Telefono'])){ ?>
<a href="#" title="" class="tooltip"> <img src="<?php echo base_url();?>iconos/phone.png" alt="Telefono" > <span><b>Telefono: </b><b class="tel"><?php echo ($var['Telefono']); ?></b></span>
</a>
<?php } ?>
<!-- URL-->
<?php if (isset($var['Web'])){ ?>
<a href="<?php echo base_url()."contador/empresa/web/".$var['ID_Empresa']."/?dir=".$var['Web'] ?>" title="" class="tooltip"> <img src="<?php echo base_url();?>iconos/url2.png" alt="Website" > <span>Ir al WebSite</span></a>
<?php } ?>
 
  </div>
 <?php } 
  // PUBLICIDAD BASICA =1
   else { ?>
 <div class="itemsB" align="center" >
   <h3><?php echo ucwords($var['Empresa']); ?></h3>
<!-- EMAIL-->
<?php if (isset($var['Email'])){ ?>
<a href="<?php echo base_url()."form_list.php?id=".$var['ID_Empresa']."&email=".$var["Mail"]."&bu=".base_url()."&tipo_ae=empresa&name_ae=".$var['Empresa'];?>" title="<?php echo ucwords($var['Empresa']); ?>- <?php echo $this->config->item('ciudadweb');; ?> - Ver Ficha Informacion" class="tooltip xleft femail"> <img src="<?php echo base_url();?>iconos/email_F2.png" alt="" > <span><b>Haga click </b>en Icono para enviar email a este alojamiento</span>
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

  <?php }
   endforeach ?>
</div>

<?php } ?>

</div>
<!-- FIN CONT MARGIN-->
</div>
<!-- FIN CONT FULL-->
 </div>
<!-- END CONTENEDOR-->


