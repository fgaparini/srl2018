<!DOCTYPE html>
<html lang="es">
  <head>
    
    <!-- TITUTLO-->
    <?php if (isset($title)) {?>
    <title><?php echo $title ; ?></title><?php } else {?>
    <title><?php echo $this->config->item('ciudadweb');; ?> <?php echo $this->config->item('provinciaweb');;?> | <?php echo $this->config->item('nameweb');; ?>
    </title>
    <?php } ?>
    
    <!-- descripcion -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($descripcion)) {?> <meta name="description" content="<?php echo $descripcion ;?>"><?php } else {?>
    <meta name="description" content="Portal de Turismo de <?php echo $this->config->item('ciudadweb');; ?> <?php echo $this->config->item('provinciaweb');;?> - <?php echo $this->config->item('ciudadweb');; ?> late - ">
    <?php } ?>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- Keywords-->
    <?php if (isset($keywords)) {?> <meta name="Keywords" content="<?php echo $keywords ;?>"><?php } else {?>
    <meta name="Keywords" lang="es" content="san, Rafael, Turismo, <?php echo $this->config->item('provinciaweb');;?>, Etc"><?php } ?>
    <meta name="author" content="sanrafaellate.com">
    <meta name="copyright" content="© 2013 Franco Gasparini Sanrafaellate.com" />
    <meta name="contact" content="contacto@sanrafaellate.com" />
    <META name="y_key" content="4b95707884045d1e"/>
    <meta name="distribution" content="global" />
    <meta name="geo.region" content="AR-M" />
    <meta name="geo.position" content="-34.613874;-68.339596" />
    <meta name="icbm" content="-34.613874, -68.339596" />
    <meta name="language" content="es" />
    <meta http-equiv="cache-control" content="max-age = 2592000" />
    <meta http-equiv="content-language" content="es" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="googlebot" content="index,follow" />
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="revisit" content="1 days" />
    <meta name="revisit-after" content="1 days" />

    <?php if (isset($agendameta)): ?>
    <meta property="og:image" content="<?php echo base_url().'upload/agendas/'.$row_Ag['ID_Agenda'] . '_1.jpg' ?>"/>
   
    <?php endif ?>
      <?php if (isset($imgface)): ?>
    <meta property="og:image" content="<?php echo $imgface ?>"/>
   
    <?php endif ?>
  
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>imagenes/icosrl.png"/>
    
    <!-- JQUERY CSS
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" /> -->
    <!-- offline -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery-ui-1.9.2.custom.min.css" />
    
    <!--FIN JQUERY CSS -->
    <!-- CSS -->
    <?php if (isset($css)): ?>
    <?php foreach ($css as $var): ?>
    <link type="text/css" href="<?php echo base_url() . $var ?>.css" rel="stylesheet" />
    <?php endforeach ?>
    <?php endif; ?>
    <!-- Start VideoLightBox.com HEAD section -->
    <link rel="stylesheet" href="<?php echo base_url()?>js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen">
  </head>
  <body>
    
    <div align="center" id="general">
      <header>
        <nav>
      <div class="nofixed" align="center"> 
        <div id="menu2" align="center">
        <div align="center">
          <ul align="left">
            <a href="<?php echo base_url(); ?>" title="San Rafael Late - Turismo San Rafael Mendoza" > <img src="<?php echo base_url() ?>logo_nuevo2.png" class="logo" alt="SAN RAFAEL LATE" Title="<?php echo $this->config->item('nameweb');; ?> - Portal de Turismo de <?php echo $this->config->item('ciudadweb');; ?>" border="0"></a>
            <li class="menuss" id="descubrela" align="left">
              <span class="title">Descúbrela</span>
<!--               <img src="<?php echo base_url() ?>iconos/show.png" style="float:right; margin:5px -7px 0 0;height:10px;width:auto; " alt=""><br><span class="info">Toda la informacion sobre <?php echo $this->config->item('ciudadweb');; ?></span>
 -->              <!-- ########## SUBMENU DESCUBRELA ######## -->
              <div class="submenu" align="left">
                <div><img src="<?php echo base_url() ?>imagenes/ciudadp.jpg" alt="" class=""></div>
                <!-- SAN RAFAEL INFO -->
                <div><ul class="">
                  <li><h2><img src="<?php echo base_url() ?>iconos/info.jpg" class="ico" alt="Informacion">Info <?php echo $this->config->item('ciudadweb');; ?></h2></li>
                  <li><a href="<?php echo base_url(); ?>san-rafael/historia-san-rafael.html" title="Reseña Historia de San Rafael"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta">Reseña Histotica</a></li>
                  <li><a href="<?php echo base_url(); ?>san-rafael/demografia-san-rafael.html" tilte="informacion geografica"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta ">Geografia</a></li>
                  <li><a href="<?php echo base_url(); ?>multimedia/Mapas/Ciudad" title="Mapa Interactivo de la ciudad ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta ">Mapa Interactivo Ciudad</a></li>
                  <li><a href="<?php echo base_url(); ?>servicios/transporte/" title="Guia de transporte ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta">Guia de Transporte</a></li>
                  <li><a href="<?php echo base_url(); ?>san-rafael/datos-utiles-san-rafael.html" title="Datos Utiles" ><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta ">Telefonos de Utilidad</a></li>
                  
                </ul></div>
                <!-- MULTIMEDIA -->
                <div>
                  <ul class="">
                    <li><h2><img src="<?php echo base_url() ?>iconos/multimedia.jpg" class="ico" alt="Multimedia fotos, videos de san rafael ?>">Multimedia</h2></li>
                    <li><a href="<?php echo base_url(); ?>multimedia/fotos" title=" .. una fotos mas que Mil Palabras"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="">Fotos</a></li>
                    <li><a href="<?php echo base_url(); ?>multimedia/videos" title="Videos de <?php echo $this->config->item('ciudadweb'); ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="">Videos</a></li>
                    <li><a href="<?php echo base_url(); ?>multimedia/Mapas/Ciudad" title="Busca restaurantes, gomerias, bares , etc en la ciudad"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="">Mapas</a></li>
                    <li><a href="#" title="Guias Turisticas Offline >"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="">Guias Offline</a></li>
                    <li><a href="http://sanrafaellate.com.ar/m" title="Version para MOBILE de esta Guia"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="">Version Mobile</a></li>
                    
                  </ul>
                </div>
                <div>
                  <h2><img src="<?php echo base_url() ?>iconos/video.jpg" class="ico" alt="video <?php echo $this->config->item('ciudadweb');; ?>">Video <?php echo $this->config->item('ciudadweb');; ?></h2><div id="videogallery"><a  href="http://www.youtube.com/v/FqfSgDLMdio?autoplay=1&rel=0&enablejsapi=1&playerapiid=ytplayer" class ="videoheader" title="Video Preserntacion"><img src="<?php echo base_url() ?>imagenes/video.jpg" alt="Video presentacion de turismo" /><span></span></a></div></div>
                <!-- TIEMPO -->
                <div align="center"><div class="container">
                  <div class="clock">
                    <div id="Date"></div>
                    <ul>
                      <li id="hours"> </li>
                      <li id="point">:</li>
                      <li id="min"> </li>
                      <li id="point">:</li>
                      <li id="sec"> </li>
                    </ul>
                  </div>
                  </div><!-- www.TuTiempo.net - Ancho:145px - Alto:106px -->
                  <div id="TT_vimEk1111SKjlQIK7AVDDDjzD6uKLnK2rdkdEsyoKEj"><h2><a href="http://www.tutiempo.net">Tutiempo.net</a></h2><a href="http://www.tutiempo.net/tiempo/San_Rafael_Aerodrome/SAMR.htm">El Clima en <?php echo $this->config->item('ciudadweb');; ?> Aerodrome</a></div>
                  <script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_vimEk1111SKjlQIK7AVDDDjzD6uKLnK2rdkdEsyoKEj"></script></div>
                  <div id="block_inf" ><div class="contac">
                    
                    <h3><img src="<?php echo base_url() ?>iconos/facebook.jpg" class="ico" alt="siguenos en Facebook"><a href="http://facebook.com/turismosanrafael" title="Sigue a San Rafael Late en Facebook " target="_blank">Siguenos en Facebook</a></h3>
                  </div>
                  <div class="contac">
                    
                    <h3><img src="<?php echo base_url() ?>iconos/twitter.jpg" class="ico" alt=""><a href="http://twitter.com/sanrafaellate" title="Sigue a San Rafael Late en Twitter " target="_blank">Siguenos en Twitter</a></h3>
                  </div>
                  <div class="contac">
                    
                    <h3><img src="<?php echo base_url() ?>iconos/contacto2.jpg" class="ico" alt="contacto"><a href="<?php echo base_url(); ?>nosotros/contacto.html" title=" Contactanos" target="_blank">Contáctanos</a></h3>
                  </div>
                  <div class="contac">
                    
                    <h3><img src="<?php echo base_url() ?>iconos/opine.jpg" class="ico" alt="opine"><a href="<?php echo base_url(); ?>nosotros/opina.html" title="Dejanos tu opinion ... la Valoramos! " target="_blank">Dejenos su Opinion</a></h3>
                  </div>
                  <div class="telefonos"><img src="<?php echo base_url() ?>iconos/telefonos.jpg" class="ico" alt="">0260 154274409 </div>
                </div>
              </div>
              <!-- ##########SUBMENU FIN DESCUBRELA ######## -->
            </li>
            <li class="menuss" id="nav_alojamiento" align="left"><span class="title">Alojamientos</span>
              <!-- <img src="<?php echo base_url() ?>iconos/show.png" style="float:right; margin:5px -7px 0 0;height:10px;width:auto; " alt=""><br><span class="info">Todo lo que necesitas para armar tu Viaje a <?php echo $this->config->item('ciudadweb');; ?> </span> -->
              <!-- ##########SUBMENU PREPARA TU VIAJE ######## -->
              <div class="submenu" align="left" >
                <!-- ALOJAMIENTOS -->
                <div id="alojamiento" class="border_rigth">
                  
                  <h2><img src="<?php echo base_url() ?>iconos/aloja.jpg" class="ico" alt="Alojamientos">Alojamientos</h2>
                  <ul class="twocolum">
                    <?php foreach ($alojarmenu as $var) {?>
                    <li><a href="<?php echo base_url()."alojamiento/". $var['UrlAlojamiento'] ?>" title="Listado de <?php echo $var['TituloAlojamiento']; ?> en <?php echo $this->config->item('ciudadweb'); ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="<?php echo $var['TituloAlojamiento']; ?>"><?php echo $var['TituloAlojamiento'] ;?></a></li>
                    
                    <?php } ?>
                  </ul>
                </div>
           
                <!-- SERVICIOS TURISTAS -->
                
             
              </div>
              <!-- ##########SUBMENU FIN PREPARA ######## -->
            </li>
            <li class="menuss" id="preptuviaje" align="left"><span class="title">Info Turistas</span>
              <!-- <img src="<?php echo base_url() ?>iconos/show.png" style="float:right; margin:5px -7px 0 0;height:10px;width:auto; " alt=""><br><span class="info">Todo lo que necesitas para armar tu Viaje a <?php echo $this->config->item('ciudadweb');; ?> </span> -->
              <!-- ##########SUBMENU PREPARA TU VIAJE ######## -->
              <div class="submenu" align="left" >
                <!-- ALOJAMIENTOS -->
               
                <!-- RESERVA ONLINE -->
                <div id="buscador_a" class="border_rigth"><form action="<?php echo base_url(); ?>multimedia/Mapas/buscadorderutas" id="balojar" method="GET"><div id="bAlojar">
                  <h2>Buscador de Rutas</h2>
                  <p>Enontra la mejor ruta a <?php echo $this->config->item('ciudadweb');; ?> desde tu casa.</p>
                  <div class=""><label for="desde">Desde:</label><input type="text" value="Direccion, Ciudad, Provincia" id="start" name="start"></div>
                  <div class=""><label for="hsta">Hasta</label><input type="text" value="Mitre 200, <?php echo $this->config->item('ciudadweb'); ?>, <?php echo $this->config->item('provinciaweb');;?> " id="emd" name="end"></div><div> <button>BUSCAR</button></div>
                  
                </div></form></div>
                <!-- SERVICIOS TURISTAS -->
                <div class="border_rigth"><ul>
                  <li><h2><img src="<?php echo base_url() ?>iconos/servicios.jpg" class="ico " alt="servicios turisticos">Servicios Utiles</h2></li>
                  <li><a href="<?php echo base_url(); ?>servicios/gastronomia" title="Donde Comer en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="gastronomía">Donde Comer?</a></li>
                  <li><a href="<?php echo base_url(); ?>servicios/transporte/alquiler-autos-san-rafael.html" title="Alquiler de Autos en <?php echo $this->config->item('ciudadweb'); ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="alquiler autos">Alquiler Autos</a></li>
                  <li><a href="<?php echo base_url(); ?>servicios/turisticos/turismo-aventura-san-rafael.html" title="Empresas Turismo Aventura en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñetas excursiones">Empresas Aventura</a></li>
                  <li><a href="<?php echo base_url(); ?>servicios/turisticos/agencias-viajes-san-rafael.html" title="Agencias de Viaje para organizar su viaje en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" agencias ">Agencias de Viaje</a></li>
                  <li><a href="<?php echo base_url(); ?>multimedia/Mapas/buscadorderutas" title="Busque la mejor ruta de su ciudad a <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="">Buscador de Rutas</a></li>
                </ul>
                </div>
                <div class=""><ul>
                  <li><h2><img src="<?php echo base_url() ?>iconos/no_te_pierdas.jpg" class="ico " alt="">No te Pierdas!</h2></li>
                  <li><a href="<?php echo base_url(); ?>circuitos-turisticos/canon-atuel.html" title="Conozca el imponente Cañon del Atuel"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta cañon del atuel <?php echo $this->config->item('ciudadweb');; ?>">Cañon del Atuel</a></li>
                  <!-- <li><a href="<?php echo base_url(); ?>vinos/champanera-bianchi" title="Descubra La Champañera Bianchi"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta chanpañera <?php echo $this->config->item('ciudadweb');; ?>">Champañera Bianchi</a></li>-->
                  <li><a href="<?php echo base_url(); ?>vinos/vinos-san-rafael.html" title="Ruta del Vino de <?php echo $this->config->item('ciudadweb');; ?> , Bodegas , varietales, etc"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" ruta del vino ">Ruta del Vino</a></li>
                  <li><a href="<?php echo base_url(); ?>olivos/olivos-san-rafael.html" title="la Ruta del Olivo de <?php echo $this->config->item('ciudadweb');; ?>, Fabricas, Plantaciones, etc."><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" ruta del olivo">Ruta del Olivos</a></li>
                  <li><a href="<?php echo base_url(); ?>turismo-aventura/turismo-aventura-san-rafael.html" title="Descubri la mejor Aventura en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" Turismo Aventura <?php echo $this->config->item('ciudadweb');; ?>">Turismo Aventura</a></li>
                  
                </ul></div>
              </div>
              <!-- ##########SUBMENU FIN PREPARA ######## -->
            </li>
            <li class="menuss" id="nav_circuitos" align="left"><span class="title">Circuitos</span>
              <!-- <img src="<?php echo base_url() ?>iconos/show.png" style="float:right; margin:5px -7px 0 0;height:10px;width:auto; " alt=""><br><span class="info">Conoce los circuitos turistico de <?php echo $this->config->item('ciudadweb');; ?> </span> -->
              <div class="submenu" align="center">
                <div id="circuitos">
                  <div>
                    <a href="<?php echo base_url(); ?>circuitos-turisticos/valle-grande.html" title="Descubri Valle Grande <?php echo $this->config->item('ciudadweb');; ?>">
                    <div id="circuito_arrow">     <img src="<?php echo base_url() ?>iconos/flecha_1_2.png"  alt=""></div>
               
                    <img src="<?php echo base_url() ?>imagenes/valleGrande.jpg" class="lafoto" alt="Valle Grande">
                    <h3>Valle Grande</h3>

                    </a>
                  </div>
                  <div>
                    <a href="<?php echo base_url(); ?>circuitos-turisticos/los-reyunos.html" title="Descubre las Bellezas de Los Reyunos">
                      <div id="circuito_arrow">     <img src="<?php echo base_url() ?>iconos/flecha_1_2.png"  alt=""></div>
                      <img src="<?php echo base_url() ?>imagenes/losReyunos.jpg" alt="Los Reyunos <?php echo $this->config->item('ciudadweb');; ?>">
                      <h3>Los Reyunos</h3>
                    </a>
                  </div>
                  <div>
                    <a href="<?php echo base_url(); ?>circuitos-turisticos/el-nihuil.html" title="Playa, arena , relax en el Nihiul .. Descubrelo">
                      <div id="circuito_arrow">     <img src="<?php echo base_url() ?>iconos/flecha_1_2.png"  alt=""></div>
                      <img src="<?php echo base_url() ?>imagenes/nihuil1.jpg" alt="El Nihuil <?php echo $this->config->item('ciudadweb');; ?>">
                      <h3>El Nihuil</h3>
                    </a>
                  </div>
                  <div>
                    <a href="<?php echo base_url(); ?>circuitos-turisticos/villa-25-mayo.html" title="Patrimonio de La humanidad , UNICO museo Habitado del Mundo">
                      <div id="circuito_arrow">     <img src="<?php echo base_url() ?>iconos/flecha_1_2.png"  alt=""></div>
                      <img src="<?php echo base_url() ?>imagenes/villa25mayo.jpg" alt="villa 25 de mayo <?php echo $this->config->item('ciudadweb');; ?>">
                      <h3>Villa 25 de Mayo</h3>
                    </a>
                  </div>
                  <div>
                    <a href="<?php echo base_url(); ?>circuitos-turisticos/ciudad-san-rafael.html" title="Descubre todo lo que podes hacer en la Ciudad">
                      <div id="circuito_arrow">     <img src="<?php echo base_url() ?>iconos/flecha_1_2.png"  alt=""></div>
                      <img src="<?php echo base_url() ?>imagenes/ciudad.jpg" alt="Ciudad de <?php echo $this->config->item('ciudadweb');; ?>">
                      <h3>Ciudad y Vinos</h3>
                    </a>
                  </div>
                  <div>
                    <a href="<?php echo base_url(); ?>circuitos-turisticos/alta-montana.html" title="Alta Montaña Relax, tranquilidad y Aventura">
                      <div id="circuito_arrow">     <img src="<?php echo base_url() ?>iconos/flecha_1_2.png"  alt=""></div>
                      <img src="<?php echo base_url() ?>imagenes/sosneado.jpg" alt="El sosneado <?php echo $this->config->item('ciudadweb');; ?>">
                      <h3>Alta Montaña</h3>
                    </a>
                  </div>
                  <div>
                    <a href="<?php echo base_url(); ?>circuitos-turisticos/las-lenas.html" title="Las Leñas, el mejor centro de Esqui Argentina.">
                      <div id="circuito_arrow">     <img src="<?php echo base_url() ?>iconos/flecha_1_2.png"  alt=""></div>
                      <img src="<?php echo base_url() ?>imagenes/lasLenas.jpg" alt="las leñas <?php echo $this->config->item('ciudadweb');; ?>">
                      <h3>Las Leñas</h3>
                    </a>
                  </div>
                  <div>
                    <a href="<?php echo base_url(); ?>circuitos-turisticos/canon-atuel.html" title="El Imponente Cañon de Atuel">
                      <div id="circuito_arrow">     <img src="<?php echo base_url() ?>iconos/flecha_1_2.png"  alt=""></div>
                      <img src="<?php echo base_url() ?>imagenes/canonAtuel.jpg" alt="Cañon del atuel <?php echo $this->config->item('ciudadweb');; ?>">
                      <h3>Cañon del Atuel</h3>
                    </a>
                  </div>
                  
                </div>
              </div>
            </li>
            <li class="menuss" id="quehacer" align="left"><span class="title">Que Hacer?</span>
              <!-- <img src="<?php echo base_url() ?>iconos/show.png" style="float:right; margin:5px -7px 0 0;height:10px;width:auto; " alt=""><br><span class="info"> -->
              <!-- Turismo Aventura, Vino y Bodegas, Olivos..Disfruta! </span> -->
              <div class="submenu" align="left">
                <!-- turismo aventura-->
                <div id="tAventura" class="border_rigth">
                  
                  <h2><img src="<?php echo base_url() ?>iconos/taventura.jpg" class="ico" alt="Turismo aventura <?php echo $this->config->item('ciudadweb');; ?>">Turismo Aventura</h2>
                  <ul class="twocolum">
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/rafting.html" title="Rafting en <?php echo $this->config->item('ciudadweb'); ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" aventura Rafting">Rafting</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/rapel.html" title="Rapel en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" Rapel">Rapel</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/kayak.html" title="kayak en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" kayak "> Kayak</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/doky.html" title="Doky en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" doky">Doky</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/windsurf.html" title="Windsurf en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" Windsurf <?php echo $this->config->item('ciudadweb');; ?>">Windsurf</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/tirolesa.html" title="Tirolesa en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" tirolesa ">Tirolesa</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/escalada.html" title="Escalada en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" escalada ">Escalada</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/barranquismo.html" title="barranquismo en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta barranquismo ">Barranquismo</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/cabalgatas.html" title="Cabalgatas en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta cabalgatas ">Cabalgatas</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/senderismo.html" title="Senderismo en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" caminatas ">Senderismo</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/4x4.html" title="Aventura 4x4 en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta aventura 4x4 ">Aventura 4x4</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/mountain-bike.html" title="Mountain Bike en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" Mountain Bike <?php echo $this->config->item('ciudadweb');; ?>">Mountain Bike</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/catamaran.html" title="catamaran en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta catamaran ">Catamaran</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/buceo.html" title="buceo en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" buceo San Rafae">Buceo</a></li>
                    <li><a href="<?php echo base_url(); ?>turismo-aventura/pesca.html" title="pesca en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt=" pesca San Rafae">Pesca</a></li>
                  </ul>
                </div>
                
                <!-- CAMINOS DEL VINO -->
                <div class="border_rigth"><ul>
                  <li><h2><img src="<?php echo base_url() ?>iconos/vinos.jpg" class="ico " alt="Caminos del Vino">Caminos Del Vino</h2></li>
                  <li><a href="<?php echo base_url(); ?>servicios/vinos/bodegas-san-rafael.html" title="conozca Bodegas en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="bodegas San Rafel">Bodegas</a></li>
                  <li><a href="<?php echo base_url(); ?>vinos/vinos-san-rafael.html" title="Toda la informacion sobre Vinos"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="Informacion de Vinos  ">Informacion de Vinos</a></li>
                  <li><h2><img src="<?php echo base_url() ?>iconos/olivos.jpg" class="ico " alt="Caminos del Vino">Caminos Del Olivo</h2></li>
                  <li><a href="<?php echo base_url(); ?>servicios/olivos/fabricas-olivos-san-rafael.html" title="fabricas de olivos en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="fabricas de Productos Olivos">Fabricas</a></li>
                  <li><a href="<?php echo base_url(); ?>olivos/olivos-san-rafael.html" title="Olivos en <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="Informacion sobre olivos">Informacion sobre Olivos</a></li>
                  
                </ul></div>
                <!-- ACTIVIDADES !-->
                <div class=""><ul>
                  <li><h2><img src="<?php echo base_url() ?>iconos/actividades.jpg" class="ico " alt="">Actividades</h2></li>
                  <li><a href="<?php echo base_url(); ?>actividades/festivales-san-rafael.html" title="Festivales de <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta festivales <?php echo $this->config->item('ciudadweb');; ?>">Festivales</a></li>
                  <li><a href="<?php echo base_url(); ?>actividades/museos-cultura-san-rafael.html" title="Listado de Museos y casas de cultura <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta Museos y casas Cultura ">Museos y Cultura</a></li>
                  <li><a href="<?php echo base_url(); ?>actividades/congresos-convenciones-san-rafael.html" title="Centro de Congresos y convenciones <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta congresos <?php echo $this->config->item('ciudadweb');; ?>">Congresos y convenciones</a></li>
                  <li><a href="<?php echo base_url(); ?>servicios/actividades/regionales-san-rafael.html" title="Regionales y Artesanias <?php echo $this->config->item('ciudadweb');; ?>"><img src="<?php echo base_url() ?>iconos/flecha_3.png" class="ico" alt="viñeta regionales ">Regionales</a></li>
                  
                </ul></div>
                <div id="agenda">
                  <h2><img src="<?php echo base_url() ?>iconos/agenda.jpg" class="ico " alt="">Agenda Eventos</h2>
                  <?php
                  $i=0;
                  foreach ($row_A as $var):
                  $i++;
                  if($i<=3) { ?>
                  <div>
                    <div class="fecha_ag">
                      <p><?php echo $var['fechaA']; ?></p>
                    </div>
                    <div class="info_ag">
                      <h3><a href="<?php echo base_url(). "agenda/" . str_replace(" ","-",$var['Titulo'])."-".$var['ID_Agenda']; ?>" title="<?php echo "Ver Detalle Evento - ".ucwords($var['Titulo'])."-". $this->config->item('ciudadweb'); ?>"><?php echo ucwords($var['Titulo']); ?></a> </h3>
                      <p><?php echo substr(strip_tags($var['Descripcion']),0, 50) ?></p>
                    </div>
                  </div>
                  <?php }
                  endforeach ?>
                </div>
                
                <!-- FIN AGENDA-->
              </li>
              
            </ul>
          </div>
        </div>
      </div>
      </nav></header>
      <!-- FIN MENU-->