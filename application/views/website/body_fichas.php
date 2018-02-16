 <!-- OBTENGO PROMOCIONES ALOJAMIENTO -->
 <?php $promos =$this->dbfichas->getpromos($row_Al['ID_Alojamiento']) ?>
 <div id="contenedor2" itemscope itemtype="http://schema.org/LodgingBusiness">
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
      <h1 align="left" itemprop="name"><?php echo $row_Al['TipoAlojamiento']; ?> <?php echo $row_Al['Nombre']; ?></h1>     
      <p class="estasaqui"><span class="here">Estas Aqui</span>: <a href="<?php echo base_url(); ?>" title="Ir a home">Home</a> >>  <a href="<?php echo base_url(). $urlback; ?>" title=" Volver a Pagina <?php echo $tipoalojamientos. " en " . $this->config->item('ciudadweb'); ?>"><?php echo $tipoalojamientos; ?> en <?php echo $this->config->item('ciudadweb'); ?></a> >><?php echo $row_Al['TipoAlojamiento']; ?> <?php echo $row_Al['Nombre']; ?> </p>
    </div>

  </div>
  <div id="cont_int">
    <div id="fichasD"  >


  <div id="ficha_info">
    <div id="ficha-tabs">
      <ul>
        <li id="fotosAlojar"><a href= "#tabs-1"  ></span>Fotos</a></li>
        <li id="mapaAlojar"><a href= "#tabs-2" >Ubicacion</a></li>
        <?php if (count($promos)>0): ?>
        <li id="Promociones"><a href= "#tabs-3" >Promociones</a></li>
         <?php endif ?>
        <!--  <li id="calendarAlojar"><a href= "#tabs-3" >Calendario</a></li>-->
      </ul>
      <div id="tabs-1">
        
        <!-- GALERIA FOOTOS -->
        <div id="gallery" class="ad-gallery">
          <div class="ad-image-wrapper">
          </div>
          
          <div class="ad-nav">
            <div class="ad-thumbs">
              <ul class="ad-thumb-list" >
                <?php $i=0; foreach ($row_FA as $var) { ?>
                <li itemscope itemtype="http://schema.org/ImageObject">
                  <a href="<?php echo base_url()."upload/alojamientos/".$var['ID_Alojamiento']."_".$var['NombreImagen'].".jpg" ?>" itemprop="contentURL" >
                  <img src="<?php echo base_url()."upload/alojamientos/thumb/".$var['ID_Alojamiento']."_".$var['NombreImagen'].".jpg" ?>" <?php if ($i==0) { ?>class="image0"<?php } ?> alt="<?php echo $var['ImagenDescripcion']; ?>">
                  </a>
                </li>
                <?php  $i++;} ?>
              </ul>
            </div>
          </div>
        </div>
        <div id="descriptions">
        </div>
      </div>
      <!-- FIN GALERIA -->
      
      <!-- TAB UBICACION -->
      <div id="tabs-2">
        <input type="hidden" id="cordeMap" value="<?php echo $row_Al['Coordenadas']; ?>">
        <div id="map"> </div> 
      </div>
      <!-- TAB PROMOCIONES  -->
          <?php if (count($promos)>0): ?>
       
        
        <div id="tabs-3" class="promociones" align="left"> 
        <!-- OBTENGO PROMOCIONES ALOJAMIENTO -->
        <?php $promos =$this->dbfichas->getpromos($row_Al['ID_Alojamiento']) ?>
          <?php foreach ($promos as $var): ?>
          <div align="left">
            <h4><?php echo $var['NombrePromo'] ?></h4>
            <p><?php echo $var['DetallePromo'] ?></p>
            <p>La promocion vigente <strong>desde <?php echo $this->gf->html_mysql($var['DesdePromo']) ?> hasta <?php echo $this->gf->html_mysql($var['HastaPromo']) ?></strong></p>
          </div>
          <?php endforeach ?>
        </div>
         <?php endif ?>
      </div>
      <div id="ficha-tabs2">
        <ul>
          <li id="tabDescrip"><a href= "#tabs-12"  >Descripcion</a></li>
          <li id="tabServ" ><a href= "#tabs-22" >Servicios</a></li>
          <!-- <li id="tabComent" ><a href= "#tabs-32" >Comentarios</a></li> -->
        </ul>
        
        <div id="tabs-12" itemprop="description"> 
          <div id="descripcion" align="left"> <?php echo $row_Al['Descripcion'] ?></div>
        </div>
        <div id="tabs-22"> 
          <div id="servicios" align="left">
            <div id="servicios">
              <ul>
                <?php foreach ($row_S as $var) { ?>
                <li>
                  <img src="<?php echo  base_url()."iconos/yes.png" ?>" alt=" Servicios <?php echo $row_Al['Nombre'] ." - ".$var['Servicio'] ;?>"><?php echo $var['Servicio'] ?>
                </li>
                <?php } ?> 
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    </div>
      <!-- FICHAS DATOS -->
      <div id="ficha_datos">
        <div id="datos_alojar" class="border-Corner borde-gris " align="left">
          <h2>Datos Alojamientos</h2>
          <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><img src="<?php echo base_url() . "iconos/direction.png"; ?>" alt="direccion - <?php echo $row_Al['TipoAlojamiento']; ?>"> <b>Direccion:</b> <span itemprop="streetAddress"><?php echo $row_Al['Direccion']; ?><span> -<span itemprop="addressLocality"> <?php echo $this->config->item('ciudadweb');?> - <?php echo $this->config->item('provinciaweb');?></span></p>
          <p ><img src="<?php echo base_url() . "iconos/phone.png"; ?>" alt=""> <b>Telefono: </b><span itemprop="telephone" ><?php echo $row_Al['Telefono']; ?></span></p>
          <?php if($row_Al['WebSite']!="") { ?> 
          <p><img src="<?php echo base_url() . "iconos/url2.png"; ?>" alt=""> 
          <b>Website:</b> 
          <a href="<?php echo base_url()."contador/alojar/web/" .$row_Al['ID_Alojamiento']."/?dir=".$row_Al['WebSite']; ?>" 
            target="_blank" title="Vistie el Web del Alojamiento"><?php echo  $row_Al['WebSite']; ?></a></p>
            <?php } ?>
          <!-- SOCIAL ALOJAMIENTOS -->
          <div id="socialA">
            <?php
            //FACEBOOK
            if($row_Al['Facebook']!="") {?>
            <a href="<?php echo base_url().'contador/alojar/facebook/'.$row_Al['ID_Alojamiento']."/?dir=".$row_Al['Facebook'] ; ?>" target="_blank"><img src="<?php echo base_url().'iconos/fb_12.png' ?>" alt="Facebook del <?php echo $row_Al['TipoAlojamiento'] ;?>  " title="ir al Facebook de <?php echo $row_Al['TipoAlojamiento'].' '.$row_Al['Nombre']  ;?>  "></a>
            <?php  } else {?>
            <img src="<?php echo base_url().'iconos/fb_1.png' ?>" alt="Facebook del <?php echo $row_Al['TipoAlojamiento'] ;?>" class="opaco">
            <?php } ?>
            <?php
            //TWITER
            if($row_Al['Twitter']!="") {?>
            <a href="<?php echo base_url().'contador/alojar/twitter/'.$row_Al['ID_Alojamiento']."/?dir=".$row_Al['Twitter'] ; ?>" target="_blank"><img src="<?php echo base_url().'iconos/twitter_12.png' ?>" alt="Twitter del <?php echo $row_Al['TipoAlojamiento'] ;?>"></a>
            <?php  } else {?>
            <img src="<?php echo base_url().'iconos/twitter_1.png' ?>" alt="Twitter del <?php echo $row_Al['TipoAlojamiento'] ;?> " class="opaco">
            <?php } ?>
            <?php
            //GPUS
            if($row_Al['Gplus']!="") {?>
            <a href="<?php echo base_url().'contador/alojar/gplus/'.$row_Al['ID_Alojamiento']."/?dir=".$row_Al['Gplus'] ; ?>" target="_blank"><img src="<?php echo base_url().'iconos/google_plus2.png' ?>" alt="Google Plus del <?php echo $row_Al['TipoAlojamiento'] ;?>"></a>
            <?php  } else {?>
            <img src="<?php echo base_url().'iconos/google_plus.png' ?>" alt="Google Plus del <?php echo $row_Al['TipoAlojamiento'] ;?>" class="opaco">
            <?php } ?>
            <?php
            //GPUS
            if($row_Al['Pinterest']!="") {?>
            <a href="<?php echo base_url().'contador/alojar/pinterest/'.$row_Al['ID_Alojamiento']."/?dir=".$row_Al['Pinterest'] ; ?>" target="_blank"><img src="<?php echo base_url().'iconos/pinterest2.png' ?>" alt="Pinterest del <?php echo $row_Al['TipoAlojamiento'] ;?>"></a>
            <?php  } else {?>
            <img src="<?php echo base_url().'iconos/pinterest.png' ?>" alt="Pinterest del <?php echo $row_Al['TipoAlojamiento'] ;?>" class="opaco">
            <?php } ?>
          </div>
        </div>
        <?php if ($row_Al['UrlBooking']!="" OR $row_Al['UrlBooking']!=NULL): ?>
          
        <?php  $bs=RAND(1,2) ;?>
        <div style=";" align="left" id="<?php echo "bookingcom".$bs ?>">
          <h2>Reserva Online </h2>
         
            <div id="">
              <div class="fechas" align="left">
                <label for="">Llegada</label>
                <input type="text" name="frombook" id="frombook">
              </div>
              <div class="fechas" align="left">
                <label for="">Salida</label>
                <input type="text" name="tobook" id="tobook">
              </div>
            <br>
              <div>  
                  <?php if ($bs==1): ?>
                  <button onclick="_gaq.push(['_trackEvent','ResOn','bookingcom','bs1']);">
                  Reservar
                  </button>
                  
                  <?php endif ?>
                  <?php if ($bs==2): ?>
                  <button onclick="_gaq.push(['_trackEvent','ResOn','bookingcom','bs2']);">
                  Reservar
                  </button>
                  
                  <?php endif ?>
               </div>
             <input type="hidden" id="UrlBooking" value="<?php echo $row_Al['UrlBooking'] ?>">
            <?php if ($bs==2): ?>
              <div class="bookinglogo">
                <img valign="center" src="<?php echo base_url() ?>imagenes/Bookimg.png" alt="">
              </div>  
            <?php endif ?>
          </div>
         
        </div>
           <?php endif ?>
           <!-- FIN FORM BOOKING -->
        <div class="border-Corner borde-gris" align="left" id="consultaF">  
          <h2>Enviar una Consulta</h2> 
          <form id="fromA" method="post"> 
            <div id="form"  align="left" >
                <!-- <div id="loading"><img src="images/ajax-loader.gif" alt=""></div>-->
                <div><label for="name">Nombre y Apellido:</label><br/><input type="text" name="name" id="name" placeholder="Su nombre Aqui"/> </div>
                <div class="fechadiv"><label for="llegada">Llegada:</label><br/><input type="text" name="from" id="from" class="fechainput"/> </div>
                <div class="fechadiv"><label for="Salida">salida:</label><br/><input type="text" name="to" id="to" class="fechainput"/> </div>
                <div><label for="email">Email:</label><br/><input type="text" name="email" placeholder="Su email Aqui" id="email"/> </div>
                <div><label for="telefono">Telefono:</label><br/><input type="text" name="telefono" id="telefono" placeholder="Su telefono Aqui"/> </div>
                <div><label for="consulta">Consulta:</label><br/><textarea name="consulta" id="consulta" cols="20" rows="6" id="consulta" placeholder="Agregue su consulta"></textarea> </div>
                <div align="right"><button type="button" id="enviar" onclick="_gaq.push(['_trackEvent','email','ficha-a','alojamientos']);">Enviar</button></div>
                <input type="hidden" value="<?php echo $row_Al['ID_Alojamiento']; ?>" id="id" name="id">
                <input type="hidden" value="<?php if($row_Al['TipoAcuerdo']=='P'){echo $row_Al['Email'];} else {echo "contacto@sanrafaellate.com.ar";} ?>" id="email_A" name="email_A">
                <input type="hidden" id="tipo_ae" name="tipo_ae" value="alojar">
                <input type="hidden" id="name_ae" name="name_ae" value="<?php echo $row_Al['TipoAlojamiento'].' '. $row_Al['Nombre'] ?>">
                <input type="hidden" id="baseurl" name="baseurl" value="<?php echo base_url(); ?>">
          </div>
        </form>
      </div>
      <?php if($row_Al['WebSite']!="") { ?>
         <div class="border-Corner borde-gris" align="center">
          <img src="http://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo $row_Al['WebSite'] ?>&bgcolor=DCEA8E" alt="QR:  <?php echo $row_Al['Nombre'] ?>"/>
         </div>
       <?php } ?>
    </div>
  </div>
</div>
</div>
<script type="text/javascript" async="async" defer="defer" src="https://dattachat.com/chat/cargar/wid/51b78919535a2659791174"></script>
<a href="javascript:;" onclick="dcJs.startSend()"><img style="border:0px;" id="dc_ImgStatus" src="https://dattachat.com/chat/img/wid/51b78919535a2659791174" /></a>