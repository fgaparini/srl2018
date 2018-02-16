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
  <h1><?php echo $row_P['TituloContenido'] ;?></h1>
  <!-- <span id="multiple" title="Envie una consulta a todos los <?php echo $titulo_p ?> en San Rafael - Mas facil, Mas rápido ..">
    <a href="<?php  echo base_url()."website/multiple/emailmultiple/?tipoalojar=".$TAlojar."&nameA=".$titulo_p."&bu=".base_url(); ?>"  class="femail" onclick="_gaq.push(['_trackEvent','email','multiple','<?php echo $titulo_p; ?>']);" rel="nofollow">
      Enviar consulta a <?php if($titulo_p=="Cabañas") {echo "todas las ".$titulo_p;} else {echo "todos los ".$titulo_p;} ?>
    </a>
  </span> -->
  <p class="estasaqui"><span class="here">Estas Aqui:</span>: <a href="<?php echo base_url(); ?>" title="Ir a home">Home</a> >> <a href="<?php echo base_url() .$row_P['TipoPagina']."/". $row_P['UrlPagina'];?>" title="<?php echo $row_P['TipoPagina']; ?> en <?php echo $this->config->item('ciudadweb'); ?>"><?php echo $row_P['TituloPagina']; ?> </a> >> <?php echo $row_P['TituloContenido']; ?> en <?php echo $this->config->item('ciudadweb');?></p>
</div>
</div>
<?php if ($foto_SliderN>0): ?>
<div id="pagina-slider">
<div id="sliderPage">
  <ul>
    <?php $i=0; foreach ($foto_Slider as $var) { ?>
    <!-- FIRST SLIDE -->
    <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="300" data-slideindex="back">
      <img src="<?php echo base_url() . "upload/paginas/" . $var['ID_Pagina'] . "_".$var['ImagenPagina']."_slider.jpg" ?>"  alt="<?php echo $var['ImagenDescripcion']; ?>">
    </li>
    <?php  } ?>
  </ul>
</div>
</div>
<?php endif ?>

<div id="cont_full" align="left">
<!-- BEGUIN CONT FULL-->
<div class="cont_margin" >
  <div id="contenido">
    <?php if ($foto_SliderN<=0 && $foto_PN >0) {
      if($foto_PN >1){;
    ?>

    <div id="imagenPag" align="center">
      <div id="gallery" class="ad-gallery">
        <div class="ad-image-wrapper">
        </div>
        <div class="ad-nav">
          <div class="ad-thumbs">
            <ul class="ad-thumb-list">
              <?php $i=0; foreach ($foto_P as $var) { ?>
              <li>
                <a href="<?php echo base_url()."upload/paginas/".$var['ID_Pagina'] . "_".$var['ImagenPagina'].".jpg" ?>">
                  <img src="<?php echo base_url() . "upload/paginas/thumb/" . $var['ID_Pagina'] . "_".$var['ImagenPagina'].".jpg" ?>" <?php if ($i==0) { ?>class="image0"<?php } ?> alt="<?php echo $var['ImagenDescripcion']; ?>">
                </a>
              </li>
              <?php  $i++;} ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php }else{
         $i=0; foreach ($foto_P as $var) { ?>
       <div id="imagenPag" align="center">
      <img style="max-width: 600px; width:100%; height:auto>" src="<?php echo base_url() . "upload/paginas/" . $var['ID_Pagina'] . "_".$var['ImagenPagina'].".jpg" ?>" <?php if ($i==0) { ?>class="image0"<?php } ?> alt="<?php echo $var['ImagenDescripcion']; ?>">
    </div>
    <?php  $i++;} ?>
    <?php
    }}
     ?>
    <!-- SUBTITULOS
    <?php if (isset($row_P['Subtitulo'])) {?>
    <div class="subtitulo" align=""><h2><i><?php echo $row_P['Subtitulo'] ;?></i></h2></div>
    <?php } ?> -->
    <?php echo $row_P['Contenido'] ;?>
  </div>
  <div id="adsC">
    <!-- PAGINAS RELACIONADAS INTERNAS -->
    <div id="relation">
      <?php  if ($int_PN>0) { ?>
      <h2>Mas de <?php echo $nametop ;?></h2>
      <?php foreach ($int_P as $var ) { ?>
      <div class="relactionItem">
        <div>
          <?php
          $fotosint=$foto_Pa = $this->dbgeneral->fotosp($var['ID_Pagina']);
          if ($fotosint['totals']>0) {// si hay fotos
          $fotoss=$fotosint['rows'];
          $i=1;
          foreach ($fotoss as $var1) {
          $namefoto[$i]=$var1["ImagenPagina"];
          }
          ?>
          <img src="<?php echo base_url() . "upload/paginas/thumb/" . $var['ID_Pagina'] . "_". $namefoto[1] .".jpg" ?>" alt="<?php echo $var['TituloContenido']; ?> en <?php echo $this->config->item('ciudadweb');; ?>">
          <?php } else { // si no hay fotos ?>
          <img src="<?php echo base_url() . "upload/nofoto.jpg" ?>" alt="<?php echo $var['TituloContenido']; ?> en <?php echo $this->config->item('ciudadweb');; ?>">
          <?php } ?>
        </div>
        <div class="intt"><h3><a href="<?php echo base_url() . $var['TipoPagina']."/". $var['Url'] ?>" title="ver mas de <?php echo $var['TituloContenido']; ?> "><?php echo $var['TituloContenido']; ?></a></h3><p><?php echo substr(strip_tags($var['Contenido']),0, 70); ?></p></div>
      </div>
      <?php } }?>
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
    <?php if ($mastipo_PN>0) {
    ?>
    <!-- PAGINAS RELACIONADAS POR TIPO-->
    <div class="" >
      <h2>Mas Info de <?php echo $row_P['TituloPagina']; ?> </h2>
      <?php foreach ($mastipo as $var ) { ?>
      <div class="relactionItem">
        <div>
          <?php
          $fotosint1=$foto_Pa = $this->dbgeneral->fotosp($var['ID_Pagina']);
          if ($fotosint1['totals']>0) {// si hay fotos
          $fotoss1=$fotosint1['rows'];
          $i=1;
          foreach ($fotoss1 as $var2) {
          $namefoto2[$i]=$var2["ImagenPagina"];
          }
          ?>
          <img src="<?php echo base_url() . "upload/paginas/thumb/" . $var['ID_Pagina'] . "_".$namefoto2[1].".jpg" ?>" alt="<?php echo $var['TituloContenido']; ?> en <?php echo $this->config->item('ciudadweb');; ?>">
          <?php } else { // si no hay fotos ?>
          <img src="<?php echo base_url() . "upload/nofoto.jpg" ?>" alt="<?php echo $var['TituloContenido']; ?> en <?php echo $this->config->item('ciudadweb');; ?>">
          <?php } ?>
        </div>
        <div class="intt"><h3><a href="<?php echo base_url() . $var['TipoPagina']."/". $var['Url'] ?>" title="Ver Mas de <?php echo $var['TituloContenido']; ?>"><?php echo $var['TituloContenido']; ?></a></h3><p><?php echo substr(strip_tags($var['Contenido']),0, 70); ?></p></div>
      </div>
    <?php } ?></div>
    <?php } ?>
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