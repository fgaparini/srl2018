<div id="contenedor2">

 <div id="cont_full" align="left">
   <!-- BEGUIN CONT FULL-->
       <div id="toplinks" align="left"><b>Estas en: </b><a href="http://sanrafaellate.com" title="Ir a home">Home</a> >> Mapas Ciudad</div>
<div class="cont_margin" >
    <div class="tituloSocial" align="left">
<div><h1><?php echo $titulo_pag ?> </div>  

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


<div id="contenido">

<?php echo $map['js']; ?>
<?php if($opciones_map=="TRUE") {?> <h2 class="opcionesh2">Opciones del Mapa:</h2><div id="formmapas">

  <form action="<?php base_url()."mapas/interactivo" ?>">

<div class="checkb"> <p>Fotos Panoramio</p> <input type="checkbox" name="panoramio" id="panoramio" value="TRUE" <?php if($Pano=="Si"){ echo 'checked="checked"';} ?>  class="check_onof" /><label for="panoramio">&#160;</label></div>
<div class="checkb"> <p>Puntos de Interes</p><input type="checkbox" name="Pinteres" id="Pinteres" value="TRUE"  <?php if($Pinteres=="Si"){ echo 'checked="checked"';} ?>   class="check_onof" /><label for="Pinteres">&#160;</label></div>
<div class="checkb"> <p>Empresas</p><input type="checkbox" name="Place" id="Place" value="TRUE"  <?php if($Place=="Si"){ echo 'checked="checked"';} ?>   class="check_onof" /><label for="Place">&#160;</label></div>

<div class="placediv" >
<label for="placeN">Buscar Empresas por Rubro:</label><input type="text" id="placeN" name="placeN"  placeholder="ej. Restaurant, Pizzerias, Hotel, VACIO=TODAS "  <?php if($PlaceName!=""){ echo "value='".$PlaceName."'";} ?> c>


</div>
<button type="submit" align="rigth">Nuevo Mapa >></button>
</form>
</div>
<?php echo $vista_actual ?>
<?php } ?>
<?php if (isset($titulo_pag2)) {
  echo "<h2>".$titulo_pag2."</h2>";
} ?>
<?php echo $map['html']; ?>
<?php if ($direccion22!="FALSE"){ ?>
<div id="directionsDiv"></div>
<?php } ?>
  

<div></div>
</div>
<div id="adsC"> 
<!-- PAGINAS RELACIONADAS INTERNAS -->
	<div id="relation">

<div id="buscadorC" align="left"> 
    <form action="">
      <h2>Buscador de Alojamientos</h2>
      <div class=""><label for="in">Llegada</label><br><input type="text" class="fechass" value="fecha Llegada" id="from"></div>
      <div class=""><label for="out">Salida</label><br><input type="text" value="Fecha Salida" id="to"></div>
      <div class="select"><label for="tipo">Tipo alojamiento</label>
      <select name="tipo" id="tipo">
          <?php foreach ($Tipo_A as $var) { ?>
          <option value="<?php echo $var['ID_TipoAlojamiento'] ;?>"><?php echo $var['TituloAlojamiento'];  ?></option>
          <?php } ?>

      </select> 
      </div>
      <div align="right" class="buttondiv"><button>Buscar..</button> </div>
    </form>
</div>


 <div align="center"><script type="text/javascript"><!--
google_ad_client = "ca-pub-7664603918719179";
/* 250x250 */
google_ad_slot = "4817257829";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div></div>
</div>

</div>
</div>

</div>

