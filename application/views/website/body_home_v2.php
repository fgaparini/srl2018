
<!--
====================================
BEGUIN CONTENIDOS
====================================
-->
<?php
// funcion acotar palabras
function acortar($texto,$maxword) {
$acortada= substr(strip_tags($texto),0,strrpos(substr(strip_tags($texto),0,$maxword)," "));
return $acortada;
}
?>
<?php $imgran = rand(1,3); ?>
<div id="slidercontent">
  <!-- BEGUIN IMAGENES -->
  <!--     <div id="imagen_fondo"><img src="<?php echo base_url() ?>imagenes/home_p2.jpg" alt="San Rafael Mendoza - Te moviliza , te Deslumbre y te Apasiona - veni vivilo!" ></div>
  -->    <!-- end IMAGENES-->
  <div id="home-slider" >
    <ul>
      
      <!-- FIRST SLIDE -->
        <li data-transition="fade" data-slotamount="5" data-masterspeed="300" >
        
        <!-- THE MAIN IMAGE IN THE SLIDE -->
        <img src="<?php echo base_url() ?>slider-home/sanrafaelapp.jpg" >

        <div class="caption large_text_white  lfb fadeout " align="left"
         data-x="left"
          data-hoffset="120"
          data-voffset="-304"
           data-y="bottom"
          data-speed="500"
          data-start="1200"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo">Lo mejor de <b>San Rafael</b> en <br>la  punta de tus dedos</div>
  <div class="caption small_text_white  lfb customin " align="left"
         data-x="left"
          data-hoffset="120"
          data-voffset="-194"
           data-y="bottom"
         data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:10;transformOrigin:0% 0%;"
            data-speed="500"
            data-start="2200"
            data-easing="Power3.easeInOut"
            data-endspeed="300">San Rafael Guide Tour, App Turística, le ofrece <br>todo lo necesario para que pueda disfrutar al máximo de <br>su estancia en San Rafael Mendoza. </div>
        <div class="caption  lfb fadeout"
          data-x="left"
          data-hoffset="130"
          data-voffset="-74"
          data-y="bottom"
          
          data-speed="500"
          data-start="2300"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo">
          <a href="https://play.google.com/store/apps/details?id=com.dbgcreative.sanrafaelapp924023" target="_blank">
             <img src="<?php echo base_url() ?>slider-home/googleplay.png" style="width:200px; height:auto">
            </a>
        </div>
        
        
        
        
        
      </li>
   <!--    <li data-transition="fade" data-slotamount="5" data-masterspeed="300" data-slideindex="back"> -->
        
        <!-- THE MAIN IMAGE IN THE SLIDE -->
<!--         <img src="<?php echo base_url() ?>slider-home/arbolada.jpg" >

        <div class="caption largeorangebg2  lfb fadeout"
         data-x="right"
          data-hoffset="-120"
          data-voffset="-174"
           data-y="bottom"
          data-speed="500"
          data-start="1200"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo"> San Rafael te        </div>

        <div class="caption  very_big_orange lfb fadeout"
          data-x="right"
          data-hoffset="-130"
          data-voffset="-124"
          data-y="bottom"
          
          data-speed="500"
          data-start="2200"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo">INSPIRA
        </div>
        
        
        
        
      </li>
      <li data-transition="fade" data-slotamount="5" data-masterspeed="300" data-slideindex="back"> -->
        
        <!-- THE MAIN IMAGE IN THE SLIDE -->
  <!--       <img src="<?php echo base_url() ?>slider-home/rafting.jpg" >
        
        <div class="caption  very_big_black lfb fadeout"
          data-x="left"
          data-hoffset="100"
          data-voffset="-134"
          data-y="bottom"
          
          data-speed="500"
          data-start="2200"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo" style="color:#96A929"> AVENTURA
        </div>
          <div class="caption largewhitebg  lfb fadeout"
         data-x="left"
          data-hoffset="100"
          data-voffset="-190"
           data-y="bottom"
          data-speed="500"
          data-start="1200"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo"> San Rafael es      
          </div>

        
        
      </li>
           <li data-transition="fade" data-slotamount="5" data-masterspeed="300" data-slideindex="back"> -->
        
        <!-- THE MAIN IMAGE IN THE SLIDE -->
   <!--      <img src="<?php echo base_url() ?>slider-home/canoa_valle.jpg" >
        
              
        <div class="caption  very_big_white lfb fadeout"
          data-x="left"
          data-hoffset="100"
          data-voffset="350"
          data-y="top"
          
          data-speed="500"
          data-start="2200"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo" style="color:#FF0000"> ENAMORA
        </div>
          <div class="caption largeblackbg2  lfb fadeout"
         data-x="left"
          data-hoffset="100"
          data-voffset="294"
           data-y="top"
          data-speed="500"
          data-start="1200"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo"> San Rafael te       
          </div>
        
        
        
        
        
      </li>
 -->
<!--
      <li data-transition="fade" data-slotamount="5" data-masterspeed="300" data-slideindex="back">
        
         THE MAIN IMAGE IN THE SLIDE 
        <img src="<?php echo base_url() ?>slider-home/gaby_2.jpg" >
        
          <div class="caption  autor "
          data-x="right"
          data-hoffset="0"
          data-voffset="-20"
          data-y="bottom"
          
          data-speed="500"
          data-start="100"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo" style="color:#FF0000"> <img src="<?php echo base_url() ?>slider-home/firma-gaby.png" alt="">
        </div>
        <div class="caption  very_big_black lfb fadeout"
          data-x="left"
          data-hoffset="700"
          data-voffset="350"
          data-y="top"
          
          data-speed="500"
          data-start="2200"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo" style="color:#FF0000"> Deslumbra
        </div>
          <div class="caption largewhitebg  lfb fadeout"
         data-x="left"
          data-hoffset="700"
          data-voffset="294"
           data-y="top"
          data-speed="500"
          data-start="1200"
          data-captionhidden="on"
          data-endeasing="easeOutExpo"
          data-easing="easeOutExpo"> San Rafael te       
          </div>
        
        
        
        
        
      </li>
-->
 
    </ul>
  </div>
</div>

  <!-- BEGUIN CONT GRAL-->
  <section id="alojar_desta">
    <h2>Alojamientos Destacados</h2>
    <div id="btn-filtros">
      
      <button title="Hoteles en San Rafael" data-filter="*">todos</button>
      <?php foreach ($ids_tipo as $key => $var2): ?>
      <button title="Hoteles en San Rafael" data-filter=".<?php echo $var2 ?>"><?php echo $tiposA[$key] ?></button>
      <?php endforeach ?>
      
      
      
    </div>


    <div id="cont_alojar" align="center">
      <?php foreach ($row_desta as $var): ?>
      <?php
      $x=1;
      $promos[$x]=$this->dbhome->getpromo($var['ID_Alojamiento']);
      
      ?>
      <div class="item-alojar <?php echo $var['ID_TipoAlojamiento'] ?>" data-category="<?php echo $var['ID_TipoAlojamiento'] ?>">
        <a href="<?php echo base_url()."alojamiento/".$var['Url'] ?>" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickhotel','<?php echo ucwords($var['Nombre']); ?>']);" title=" <?php echo $var['TipoAlojamiento'].' '.ucwords($var['Nombre']); ?>">
          <?php if ($promos[$x]>0) { ?>
          <div class="conpromo"></div>
          <?php } ?>
          <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1_p.jpg" ?>" alt="Hotel <?php echo ucwords($var['Nombre']); ?> " >
        </a>
        <div class="info_alojar">
          <h3>
          <a href="<?php echo base_url()."alojamiento/".$var['Url'] ?>"  onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickhotel','<?php echo ucwords($var['Nombre']); ?>']);">
            <?php echo $var['TipoAlojamiento'] .' '. ucwords($var['Nombre']); ?>
          </a>
          </h3>
          <!--                 <p><?php echo acortar($var['Descripcion'],100); ?>.. </p>
        -->             </div>
        
      </div>
      <?php $x++; ?>
      <?php endforeach ?>
    </div>
      <div class="" style="margin: 20px 0 ">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- banner home grande -->
      <ins class="adsbygoogle"
           style="display:inline-block;width:728px;height:90px"
           data-ad-client="ca-pub-7664603918719179"
           data-ad-slot="1137943866"></ins>
    <script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
  </div>
  </section>
  
  <section id="destacado_post">
  <h2>Destacamos.. </h2>  
   <div id="destacamos" align="center">
              
              <?php foreach ($row_p as $var): ?>
              <article>
                <div align="left">
                  
                  <header>
                    <div class="imag">
                      <img src="<?php echo base_url() . "upload/paginas/" . $var['ID_Pagina'] . "_1.jpg" ?>" alt="">
                    </div>
                    <h3>
                    <a href="<?php echo base_url().$var['TipoPagina']."/" .$var['Url'] ;  ?>" title="<?php echo ucwords($var['TituloContenido']); ?> - Ver Info completa" onclick="javascript:_gaq.push(['_trackEvent','Home','Destacados','']);">
                      <?php echo ucwords($var['TituloContenido']); ?>
                    </a>
                    </h3>
                  </header>
                  <section>
                    <p>
                      <?php echo acortar($var['Contenido'],200); ?>... <a href="<?php echo base_url().$var['TipoPagina']."/" .$var['Url'] ; ?>" title="<?php echo ucwords($var['TituloContenido']); ?> - Ver Info completa">Seguir Leyendo</a>
                    </p>
                  </section>
                </div>
              </article>
              <?php endforeach ?>
                            <div class="masdesta" align="center"><span><a href="<?php echo base_url()."destacados/todos" ?>">Mas Destacados >></a></span></div>

           </div>
  </section>
  <div class="" style="margin: 20px 0 ">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- banner home grande -->
      <ins class="adsbygoogle"
           style="display:inline-block;width:728px;height:90px"
           data-ad-client="ca-pub-7664603918719179"
           data-ad-slot="1137943866"></ins>
    <script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
  </div>
   <section id="destacado_post" style="background-color:#4E4E4E;color:#fff">
  <h2 style="color:#FFF">Circuitos Turisticos .. </h2>  
   <div id="cont_caruselcirc" align="center">
              <div id="caruselcirc">
              <?php foreach ($circuturis as $var):

                    if ($var['TotalImg']>0) {
                      # code...
                   
               ?>
            
                 <div class="caruselcirc">  
                  <article>
                    <img src="<?php echo base_url() . "upload/paginas/" . $var['ID_Pagina'] . "_1.jpg" ?>" alt="">
                  <header>
                    
                    <h3>
                    <a href="<?php echo base_url().$var['TipoPagina']."/" .$var['Url'] ;  ?>" title="<?php echo ucwords($var['TituloContenido']); ?> - Ver Info completa" onclick="javascript:_gaq.push(['_trackEvent','Home','Destacados','']);">
                      <?php echo ucwords($var['TituloContenido']); ?>
                    </a>
                    </h3>
                  </header>
                   <section>
                    <p>
                      <?php echo acortar($var['Contenido'],200); ?>... <a href="<?php echo base_url().$var['TipoPagina']."/" .$var['Url'] ; ?>" title="<?php echo ucwords($var['TituloContenido']); ?> - Ver Info completa">Seguir Leyendo</a>
                    </p>
                  </section>
                   </article>
                 </div>
        
             
              <?php 
              }
              endforeach ?>
              </div>
           </div>
  </section>

  <section id="noticias_new">
    <h2>Noticias </h2>  
      <div id="noticias" align="center">
              <?php foreach ($row_not as $var): ?>
              <article>
                <div align="left">
                  
                  <header>
                    <div class="imag">
                      <img src="<?php echo base_url() . "upload/paginas/" . $var['ID_Pagina'] . "_1.jpg" ?>" alt="">
                    </div>
                    <h3>
                    <a href="<?php echo base_url().$var['TipoPagina']."/" .$var['Url'] ;  ?>" title="<?php echo ucwords($var['TituloContenido']); ?> - Ver Info completa" onclick="javascript:_gaq.push(['_trackEvent','Home','Destacados','']);">
                      <?php echo ucwords($var['TituloContenido']); ?>
                    </a>
                    </h3>
                  </header>
                  <section>
                    <p>
                      <?php echo acortar($var['Contenido'],200); ?>... <a href="<?php echo base_url().$var['TipoPagina']."/" .$var['Url'] ; ?>" title="<?php echo ucwords($var['TituloContenido']); ?> - Ver Info completa">Seguir Leyendo</a>
                    </p>
                  </section>
                </div>
              </article>
              <?php endforeach ?>
              <div class="masdesta" align="center"><span><a href="<?php echo base_url()."noticias/noticias-san-rafael" ?>">Mas noticias >></a></span></div>
            </div>
             <div class="" style="margin: 20px 0 ">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- banner home grande -->
      <ins class="adsbygoogle"
           style="display:inline-block;width:728px;height:90px"
           data-ad-client="ca-pub-7664603918719179"
           data-ad-slot="1137943866"></ins>
    <script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
  </div>
  </section>

      <!-- END CONTENEDOR-->
 