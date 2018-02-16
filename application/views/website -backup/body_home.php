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
 <div id="contenedorhome">
    <!-- BEGUIN IMAGENES -->
    <div id="imagen_fondo"><img src="<?php echo base_url() ?>imagenes/top<?php echo $imgran; ?>.jpg" alt="San Rafael Mendoza - Te moviliza , te Deslumbre y te Apasiona - veni vivilo!" ></div>
    <!-- end IMAGENES-->  

    <!-- BEGUIN CONT GRAL-->

    <div id="cont_gral">
        <!-- BEGUIN CONT PPAL-->
        <div id="cont_ppal" align="left">
       
            <!-- BEGUIN TABS--> 
            <section>
            <div id="tabs">
                <ul>
                    <li><a href= "#tabs-1" title="Hoteles en San Rafael">Hoteles</a></li>
                    <li><a href= "#tabs-2" title="Cabañas en San Rafael">Cabañas</a></li>
                    <li><a href= "#tabs-3" title="Chalet & Deptos en San Rafael">Chalets & Deptos</a></li>
                    <li><a href= "#tabs-4" title="Excursiones en San Rafael Mendoza">Excursiones</a></li>
                </ul>
                <article>
                <div id="tabs-1">
                    <div id="alojar_tabs" align="center">
                        <?php foreach ($row1 as $var): ?>
                            <?php 
                                  $x=1;
                                  $promos[$x]=$this->dbhome->getpromo($var['ID_Alojamiento']);
                                  
                            ?> 
                                <div align="left">
                                    <?php if ($promos[$x]>0) { ?>
                                    <div class="conpromo"></div>
                                    <?php } ?>
                                    <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1.jpg" ?>" alt="Hotel <?php echo ucwords($var['Nombre']); ?> " width="100px" height="75px">
                                    <h2><a href="<?php echo base_url()."alojamiento/".$var['Url'] ?>" title="Hotel <?php echo ucwords($var['Nombre']); ?> en San Rafael" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickhotel','<?php echo ucwords($var['Nombre']); ?>']);"><?php echo ucwords($var['Nombre']); ?></a></h2>
                                    <p><?php echo acortar($var['Descripcion'],100); ?>.. </p>
                                    <span class="button"><a href="<?php echo base_url()."alojamiento/".$var['Url'] ?>" title="Hotel <?php echo ucwords($var['Nombre']); ?>- Ver Ficha Informacion" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickhotel','<?php echo ucwords($var['Nombre']); ?>']);">+ INFO</a> </span>
                                </div>
                       <?php $x++; ?>
                          <?php endforeach ?>
                                            <div class="masalojar" align="center"><span><a href="<?php echo base_url()."alojamiento/hoteles-san-rafael.html" ?>" title="Ver mas Hoteles en San Rafael" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','mashoteles','']);">Ver más hoteles  >></a></span></div>

                    </div>
                </div>
                </article>
                <article>
                <div id="tabs-2">
                    <div id="alojar_tabs" align="center">
                        
                    <?php foreach ($row2 as $var): ?>
                                                        <?php 
                                  $x=1;
                                  $promos[$x]=$this->dbhome->getpromo($var['ID_Alojamiento']);
                                  
                            ?> 
                      
                                <div align="left">
                                  <?php if ($promos[$x]>0) { ?>
                                    <div class="conpromo"></div>
                                    <?php } ?>
                                    <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1.jpg" ?>" alt="Cabañas <?php echo ucwords($var['Nombre']); ?> " width="100px" height="75px">
                                 <h2><a href="<?php echo base_url()."alojamiento/".$var['Url'] ?>" title="Cabañas <?php echo ucwords($var['Nombre']); ?> en San Rafael" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickcab','<?php echo ucwords($var['Nombre']); ?>']);"><?php echo ucwords($var['Nombre']); ?></a></h2>
                            
                                    <p><?php echo acortar($var['Descripcion'],100); ?> </p>
                                    <span class="button">
                                      <a href="<?php echo base_url()."alojamiento/".$var['Url'] ?>" title="Cabañas <?php echo ucwords($var['Nombre']); ?>- Ver Ficha Informacion" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickcab','<?php echo ucwords($var['Nombre']); ?>']);">
                                        + INFO
                                      </a> 
                                    </span>
                               </div>
                       
                          <?php endforeach ?>
                            <div class="masalojar" align="center">
                              <span>
                                <a href="<?php echo base_url()."alojamiento/cabanas-san-rafael.html" ?>" title="Ver mas Cabañas en San Rafael" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','mascab','']);">
                                  Ver más Cabañas  >>
                                </a>
                              </span>
                            </div>

                    </div>
                </div>
                </article>
                <article>
                <div id="tabs-3">
                    <div id="alojar_tabs" align="center">
                        <?php foreach ($row3 as $var): ?>
                            <?php 
                                  $x=1;
                                  $promos[$x]=$this->dbhome->getpromo($var['ID_Alojamiento']);
                                  
                            ?> 
                                <div align="left">
                                  <?php if ($promos[$x]>0) { ?>
                                    <div class="conpromo"></div>
                                    <?php } ?>
                                    <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1.jpg" ?>" alt="Chalet <?php echo ucwords($var['Nombre']); ?> " width="100px" height="75px">
                                  <h2>
                                    <a href="<?php echo base_url()."alojamiento/".$var['Url'] ?>" title="Ver mas info <?php echo ucwords($var['Nombre']); ?> " onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickdepto','<?php echo ucwords($var['Nombre']); ?>']);">
                                      <?php echo ucwords($var['Nombre']); ?>
                                    </a>
                                  </h2>
                            
                                    <p><?php echo acortar($var['Descripcion'],100); ?> </p>
                                    <span class="button">
                                      <a href="<?php echo base_url()."alojamiento/".$var['Url'] ?>" title="Chalet <?php echo ucwords($var['Nombre']); ?>- - Ver Ficha Informacion" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickdepto','<?php echo ucwords($var['Nombre']); ?>']);">
                                        + INFO
                                      </a> 
                                    </span>
                             
                                </div>
                         <?php $x++; ?>
                        <?php endforeach ?>
                        <div class="separador"></div>
                          <div class="masalojar2" align="center">
                            <span>
                              <a href="<?php echo base_url()."alojamiento/chalets-san-rafael.html" ?>" title="Ver mas Cabañas en San Rafael" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickchalet','']);">
                                Ver más Chalets  >>
                              </a>
                            </span>
                          </div>
                         <div class="masalojar2" align="center">
                          <span>
                            <a href="<?php echo base_url()."alojamiento/departamentos-san-rafael.html" ?>" title="Ver mas Cabañas en San Rafael" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickdepto','']);">
                              Ver más Deptos  >>
                            </a>
                          </span>
                        </div>

                    </div>
                </div>
                </article>
                <article>
                <div id="tabs-4">
                    <div id="alojar_tabs">
                    
                          <?php foreach ($row4 as $var): ?>
                          
                                <div>
                                    <img src="<?php echo base_url() . "upload/empresas/thumb/" . $var['ID_Empresa'] . "_1.jpg" ?>" alt="<?php echo ucwords($var['Empresa']); ?> - Excursiones" width="100px" height="75px">
                                    <h2><?php echo ucwords($var['Empresa']); ?></h2>
                                    <p><?php echo acortar($var['Descripcion'],100); ?> </p>
                                    <span class="button">
                                      <a href="<?php echo base_url() ."servicios/turisticos/turismo-aventura/".$var['Url'] ; ?>" Title="<?php echo ucwords($var['Empresa']); ?> - Ficha Información" onclick="javascript:_gaq.push(['_trackEvent','DestaHome','clickexc','<?php echo ucwords($var['Empresa']); ?>']);">
                                        + INFO
                                      </a> 
                                    </span>
                                </div>
                     
                        <?php endforeach ?>
                       
                       

                    </div>
                </div>
                </article>
            </div>
            <section>
          
            <!-- BEGUIN fin tabs-->
            <div align="center">

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 468x60, creado 15/03/10 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-7664603918719179"
     data-ad-slot="7799577076"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<p style="margin:0px">
  <a href="http://sanrafaellate.com.ar/propiedadessrl" target="_blank" onclick="javascript:_gaq.push(['_trackEvent','Linkext','clickext','PropiedadesSRL']);">
    Propiedades en San Rafael
  </a>
</p>
</div>
            <!-- BEGUIN DESTACADOS-->
            <section id="destacados">

            <div id="destacamos" align="center">
                <h2 align="left">Destacamos..</h2> 
                       <?php foreach ($row_p as $var): ?>

                <article>
                  <div align="left">
                    
                   <header>
                    <div class="imag">
                      <img src="<?php echo base_url() . "upload/paginas/thumb/" . $var['ID_Pagina'] . "_1_p.jpg" ?>" alt=""> 
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
                  <div class="masdesta" align="center"><span><a href="<?php echo base_url()."destacados/todos" ?>">Mas destacados >></a></span></div>
            </div>
            </section>
            <!-- FIN  DESTACADOS-->
                        <!-- BEGUIN NOTICIAS-->
            <section id="noticiasgral">

            <div id="noticias" align="center">
                <h2 align="left">Noticias de San Rafael..</h2> 
                       <?php foreach ($row_not as $var): ?>

                <article>
                  <div align="left">
                    
                   <header>
                    <div class="imag">
                      <img src="<?php echo base_url() . "upload/paginas/thumb/" . $var['ID_Pagina'] . "_1_p.jpg" ?>" alt=""> 
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
            </section>
            <!-- FIN  DESTACADOS-->
           
          <!--   <div align="center"> <a href="http://www.despegar.com.ar/hoteles/hl-mdz-i1/hoteles-en-mendoza/?cid=19" class="titulos_12_grisc"></a></div> -->
            <!-- BEGUIN AGENDA-->
          <section>
<div id="agendaC">
    <h2>Agenda Cultural</h2>
    <p>Los mejores Eventos en <?php echo $this->config->item('ciudadweb'); ?> para organizar tus dias.</p>
    <div id="carusel">
      <?php foreach ($row_A as $var): ?>
      <article>
        <div class="carusell">
             <p class="fecha"><?php echo $var['fechaA']; ?></p>

             <?php

             //OBTENGO IMAGENES DE AGENDA
              $imgAgenda = $this->dbagenda->agendaimg($var['ID_Agenda']);

             if (count($imgAgenda)>0) {
              ?>
            <img src="<?php echo base_url() . "upload/agendas/thumb/" . $var['ID_Agenda'] . "_1_p.jpg" ?>" alt="$var['Titulo'])" alt="<?php echo ucwords($var['Titulo']); ?>">
            <?php } else {  ?>
            <img src="<?php echo base_url() . "upload/nofoto.jpg" ?>" alt="<?php echo ucwords($var['Titulo']); ?>">
            <?php } ?>
            <header>
            <h3>
              <a href="<?php echo base_url(). "agenda/" . str_replace(" ","-",$var['Titulo'])."-".$var['ID_Agenda']; ?>" title="<?php echo "Ver Detalle Evento - ".ucwords($var['Titulo']) ?>" onclick="javascript:_gaq.push(['_trackEvent','Home','Agenda','']);">
                <?php echo ucwords($var['Titulo']); ?>
              </a>
            </h3>
            </header>
           
        </div>
        </article>
        <?php endforeach ?>
    </div>
</div>
</section>
            <!-- END AGENDA-->
        </div>
        <!-- fin PPAL-->

        <!-- BEGUIN ADS-->
        
        <div id="cont_ads">

 <?php 
$bdor = 2;
if($bdor==1){
 $this->load->view('website/buscador_despegar'); 
} else {
 $this->load->view('website/buscador_srl'); 

}

 ?>
 <!-- PUBLICIDAD BANNER LATERAL -->
 <aside>
<div class="cont_120">
   <?php $this->load->view('website/ads_home_120'); ?>
</div>
<!-- PUBLICIDAD BANNER CUADRADO -->


<div class="cont_250">
           <?php $this->load->view('website/ads_home_250'); ?>
         
          <?php if (count($row_pro)>0): ?>
            
          
           <div id="promociones"> 
            <h2>Promo Alojamientos</h2>
            <?php foreach ($row_pro as $promo): ?>
            
             <div class="items" align="left">
              <div class="imgpromo">
                  <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $promo['ID_Alojamiento'] . "_1.jpg" ?>" alt="Promocion <?php echo $promo['TipoAlojamiento']. " ". $promo['Nombre'] ?>" width="60px" heigh="auto" alt="">
              </div>
              <div class="infopromo" >
                <div class="title">
                  <a href="<?php echo base_url()."alojamiento/".$promo['Url'] ?>" title="info promocion <?php echo $promo['TipoAlojamiento']. " ". $promo['Nombre'] ?>" onclick="javascript:_gaq.push(['_trackEvent','Home','PromoHome','']);">
                    <?php if (strlen($promo['TipoAlojamiento']. " ". $promo['Nombre'])<20){echo ucwords($promo['TipoAlojamiento']. " ". $promo['Nombre']);} else {echo ucwords($promo['Nombre']);}   ?>
                  </a></div>
                <div class="promoname"><?php echo $promo['NombrePromo'] ?></div>
                <div class="detallepromos"><?php echo acortar($promo['DetallePromo'],60); ?>..</div>
              </div>
            </div>
           <?php endforeach ?>
           </div>
          <?php endif ?>
           <div><a class="twitter-timeline" href="https://twitter.com/sanrafaellate" data-widget-id="339367429610303489">Tweets por @sanrafaellate</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
<div><?php $this->load->view('website/ads_google_250'); ?></div>
<br>
<!-- Inserta esta etiqueta donde quieras que aparezca widget. -->
<div class="g-page" data-width="250" data-href="//plus.google.com/u/0/107577064684316171191" data-showtagline="true" data-rel="publisher"></div>

<!-- Inserta esta etiqueta después de la última etiqueta de widget. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'es'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</div>


        <!-- END ADS-->
    </div>
    </aside>
    <!-- FIN CONT GRAL-->
 </div>
<!-- END CONTENEDOR-->
</div>