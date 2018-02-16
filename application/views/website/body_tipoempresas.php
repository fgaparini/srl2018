 <!--
====================================
BEGUIN CONTENIDOS
====================================
-->
<div id="contenedor2">
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
     
      <p class="estasaqui"><span class="here">Estas Aqui:</span>: <a href="<?php echo base_url(); ?>" title="Ir a home">Home</a> >> <a href="<?php echo base_url().'servicios/'.$tipoempresas['TipoEmpresa'];?>" title="<?php echo $tipoempresas['TituloEmpresa']; ?>"> <?php echo $tipoempresas['TituloEmpresa']; ?></a></p>
    </div>
</div>
 <div id="cont_full">
         <!-- BEGUIN CONT FULL-->
      <div class="cont_margin" >
     

          <div class="cont_D">
            
        
          <div align="left"><?php echo $tipoempresas['ContEmpresa'] ?></div>
<div id="menusubtipo">
<h2>Selecciona la categoria para ver empresas</h2>
  <ul>
  <?php foreach ($subtipo as $var2) { ?>
  <li><a href="<?php echo base_url()."servicios/". $tipoempresas['TipoEmpresa'] . "/".$var2['UrlSubEmpresa'] ?>"><?php echo $var2['SubtipoEmpresa']; ?></a></li>
  <?php } ?>
</ul>

</div>
          </div>
          <div class="cont_adss">
<div id="menulat_subtipo" align="left">
  <div class="title">Tipo Empresas</div>
  <ul>
    <?php foreach ($subtipo as $var2) { ?>
  <li><a href="<?php echo base_url()."servicios/". $tipoempresas['TipoEmpresa'] . "/".$var2['UrlSubEmpresa'] ?>"><?php echo $var2['SubtipoEmpresa']; ?></a></li>
  <?php } ?>
  </ul>
  </div>
  
<div align="center" class="publi250x250"><script type="text/javascript"><!--
google_ad_client = "ca-pub-7664603918719179";
/* 250x250 */
google_ad_slot = "4817257829";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>

<div align="center" class="publi250x250"><script type="text/javascript"><!--
google_ad_client = "ca-pub-7664603918719179";
/* 250x250 */
google_ad_slot = "4817257829";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
          </div>
    </div>
<!-- FIN CONT MARGIN-->
</div>
<!-- FIN CONT FULL-->
 </div>
<!-- END CONTENEDOR-->


