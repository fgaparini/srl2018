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
<div id="contenedor2">
  <div id="cont_full">
    <!-- BEGUIN CONT FULL-->
    <div id="toplinks" align="left"><b>Estas en: </b><a href="http://sanrafaellate.com.ar" title="Ir a home">Home</a> >> <a href="<?php echo base_url().'alojamientos/alojamientos-san-rafael.html';?>" title="Alojamientos en <?php echo $this->config->item('ciudadweb');; ?>">Alojamientos >> </a> <?php echo $titulo_p; ?> en  <?php echo $this->config->item('ciudadweb');; ?></div>
    <div class="cont_margin" >
      <!--   <div id="buscar_FULL" align="left" class="ocultar">
        
        <div class="leftC">
          <div id="buscador_aloja"><h2>Buscador de Alojamientos</h2>
            <p>Busca tu alojamiento ideal online!.. consulta disponibilidad , tarifas, servicios, etc en tiempo real de manera facil sencilla y <b>paga en 12 cuotas sin interes!!</b></p>
            <div><label for="arivo">Llegada:</label><input type="text" id="from"></div>
            <div><label for="salida">Salida:</label><input type="text" id="to"></div>
            <div><label for="">Tipo:</label><select name="tipo" id="tipo">
            <?php // foreach ($row_T as $var) {
            //echo "<option value=".$var['ID_TipoAlojamiento'].">".$var['TipoAlojamiento']."</option>";
            //  } ?>
          </select> </div>
          <div align="right"><button>Buscar..</button></div>
        </div>
        <div align="center">
          <div class="publi500x80" ><?php //$this->load->view('website/ads_google_468'); ?></div>
        </div>
      </div>
      
      <div id="asd_busca" align="center">
        <div class="publi250x250"><?php //$this->load->view('website/ads_google_250'); ?>
        </div>
      </div>
    </div> -->
    
    <div align="left" id="#listado" itemscope itemtype="http://schema.org/ItemList" >
      <h1 itemprop="name">
        <?php echo $titulo_p; ?> en <?php echo $this->config->item('ciudadweb'); ?>
      </h1>
      <?php if ((count($rowD)>0 OR count($rowL)>0) AND $titulo_p!="Alquiler Casas Turisticas"  ){ ?>
        <span id="multiple" title="Envie una consulta a todos los <?php echo $titulo_p ?> en San Rafael - Mas facil, Mas rápido ..">
          <a href="<?php  echo base_url()."website/multiple/emailmultiple/?tipoalojar=".$TAlojar."&nameA=".$titulo_p."&bu=".base_url(); ?>"  class="femail" onclick="_gaq.push(['_trackEvent','email','multiple','<?php echo $titulo_p; ?>']);" rel="nofollow">
            Enviar consulta a <?php if($titulo_p=="Cabañas") {echo "todas las ".$titulo_p;} else {echo "todos los ".$titulo_p;} ?> 
         </a>
        </span>
      <?php } ?>
          <?php  if (count($rowD)==0 & count($rowL)==0) { 
            echo "<p>Lo Lamentamos pero no tenemos nngun registro de <b>".$titulo_p ." </b></p>" ;
          } ?>
      <p style="margin-left:10px">
        Completa guía de <strong><?php echo $titulo_p; ?></strong> en <strong>San Rafael , Valle Grande, Cañón del Atuel</strong>, etc. para la mejor programación de su estadía en nuestra ciudad.
      </p>
    </div>

    <!--   =========================        -->
    <!--    DSTACADOS              -->
    <!--   =========================        -->
    <?php if (count($rowD)>0){ ?>
    <div id="dir_dest" class="">
      <h2>DESTACADOS</h2>

      <!-- Listo todos los alojamientos destacados -->
      <?php foreach ($rowD as $var):
          //Verifico las promociones de cada Alojamiento
          $x=1;
          $promos[$x]=$this->dblistado->getpromo($var['ID_Alojamiento']);
          ?>

            <div itemscope itemtype="http://schema.org/LodgingBusiness">
        <?php if ($promos[$x]>0) { ?>
        <!-- Si Hay , informamos las Promociones  -->
        <div class="conpromo"></div>
        <?php } ?>
        <h3 itemprop="name">
          <?php if (strlen($name_T." ".ucwords($var['Nombre']))<25){echo $name_T." ".ucwords($var['Nombre']);} else {echo ucwords($var['Nombre']);} ?>
        </h3>
        <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1_p.jpg"; ?>" alt="Foto Alojamiento" title="<?php echo $name_T." ".ucwords($var['Nombre']); ?>" class="princ" itemprop="image">
        <div class="dir_H" align="center">
          <h3> 
            <a href="<?php echo base_url().'alojamiento/'.$var['Url'] ?>" title="Mas Detalle <?php echo $name_T." ".ucwords($var['Nombre']); ?> - Ver Ficha Informacion" onclick="_gaq.push(['_trackEvent','ficha','vista-desta','<?php echo $var['Nombre']; ?>']);">
          <?php if (strlen($name_T." ".ucwords($var['Nombre']))<25){echo $name_T." ".ucwords($var['Nombre']);} else {echo ucwords($var['Nombre']);} ?>
          </a>
          </h3>
          <p><?php echo  acortar($var['Descripcion'],100); ?> ...</p>
          <!-- EMAIL-->
          <?php if (isset($var['Email'])){ ?>
          <a href="<?php echo base_url()."form_list.php?id=".$var['ID_Alojamiento']."&email=".$var["Email"]."&bu=".base_url()."&tipo_ae=alojar&name_ae=".$name_T." ".$var['Nombre'];?>" title="Enviarle Email ?> " class="tooltip femail" onclick="javascript:_gaq.push(['_trackEvent','email','simple','<?php echo $titulo_p; ?>']);"> <img src="<?php echo base_url();?>iconos/email_F.png" alt="Enviar Email" > <span><b>Haga click </b>en Icono para enviar email a este alojamiento</span>
          </a>
          <?php } ?>
          <!-- direccion-->
          <?php if (isset($var['Direccion'])){ ?>
          <a href="#" title="" class="tooltip"> <img src="<?php echo base_url();?>iconos/direction2.png" alt="Direccion de <?php echo $var['Nombre']; ?>" > <span>
            <?php echo ucwords($var['Direccion']); ?> -  <?php echo $this->config->item('ciudadweb'); ?></span>
          </a>
          <?php } ?>
          <!-- TELEFONO-->
          <?php if (isset($var['Telefono'])){ ?>
          <a href="#" title="" class="tooltip"> <img src="<?php echo base_url();?>iconos/phone3.png" alt="Su Telefono" > <span><b>Telefono: </b><b class="tel"><?php echo ($var['Telefono']); ?></b></span>
          </a>
          <?php } ?>
          <!-- URL-->
          <?php if (isset($var['WebSite']) AND  $var['WebSite']!='' ){ ?>
          <a href="<?php echo base_url()."contador/alojar/web/".$var['ID_Alojamiento']."/?dir=".$var['WebSite'] ?>" target="_blank" title="" class="tooltip urllink"> <img src="<?php echo base_url();?>iconos/url.png" alt="Visita su Web" > <span>Ir al WebSite</span></a>
          <?php } ?>
          <div class="butons"><a href="<?php echo base_url().'alojamiento/'.$var['Url'] ?>" title="Ampliar Info Alojamiento (fotos, Ubicaicon, Etc)" onclick="_gaq.push(['_trackEvent','ficha','vista-desta','<?php echo $var['Nombre']; ?>']);">Ampliar Info >></a></div>
        </div>
      </div>
      <?php $x++; ?>
      <?php endforeach ?>
    </div>
    <?php } ?>
    <?php if (count($rowL)>0){?>
    <div id="dir_" >
      
      <?php foreach ($rowL as $var): ?>
      <?php
      //SI NO ES PUBLI BASICA =0
      if($var['Basico']=="0"){ ?>
      
      <?php
      $z=1;
      $promos[$z]=$this->dblistado->getpromo($var['ID_Alojamiento']);
      
      ?>
      <div class="items" itemscope itemtype="http://schema.org/LodgingBusiness">
        <?php if ($promos[$z]>0) { ?>
        <div class="conpromo"></div>
        <?php } ?>
        <h3 itemprop="name"><?php if (strlen($name_T." ".ucwords($var['Nombre']))<25){echo $name_T." ".ucwords($var['Nombre']);} else {echo ucwords($var['Nombre']);} ?> </h3>
        <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1_p.jpg"; ?>" alt=" Fotos de <?php echo ucwords($var['Nombre']); ?>" title="Foto alojamiento" class="princ" itemprop="image">
        <div class="dir_H" align="center">
          <h3>
          <a href="<?php echo base_url().'alojamiento/'.$var['Url'] ?>" title="Ver Ficha Informacion">
          <?php if (strlen($name_T." ".ucwords($var['Nombre']))<25){echo $name_T." ".ucwords($var['Nombre']);} else {echo ucwords($var['Nombre']);} ?> </a>
          </h3>
          <p><?php echo  acortar($var['Descripcion'],110); ?> ...</p>
          <!-- EMAIL-->
          <?php if (isset($var['Email'])){ ?>
          <a href="<?php echo base_url()."form_list.php?id=".$var['ID_Alojamiento']."&email=".$var["Email"]."&bu=".base_url()."&tipo_ae=alojar&name_ae=".$name_T." ".$var['Nombre'];?>" title="Enviar Email" class="tooltip femail" onclick="javascript:_gaq.push(['_trackEvent','email','simple','<?php echo $titulo_p; ?>']);"> <img src="<?php echo base_url();?>iconos/email_F.png" alt="Enviar EMail a Alojamiento" > <span><b>Haga click </b>en Icono para enviar email a este alojamiento</span>
          </a>
          <?php } ?>
          <!-- direccion-->
          <?php if (isset($var['Direccion'])){ ?>
          <a href="#" title="" class="tooltip"> <img src="<?php echo base_url();?>iconos/direction2.png" alt="Direccion del Alojamiento" > <span><?php echo ucwords($var['Direccion']); ?> -  <?php echo $this->config->item('ciudadweb');; ?></span>
          </a>
          <?php } ?>
          <!-- TELEFONO-->
          <?php if (isset($var['Telefono'])){ ?>
          <a href="#" title="" class="tooltip"> <img src="<?php echo base_url();?>iconos/phone3.png" alt="Telefono " > <span><b>Telefono: </b><b class="tel"><?php echo ($var['Telefono']); ?></b></span>
          </a>
          <?php } ?>
          <!-- URL-->
          <?php if (isset($var['WebSite']) AND  $var['WebSite']!='' ){ ?>
          <a href="<?php echo base_url()."contador/alojar/web/".$var['ID_Alojamiento']."/?dir=".$var['WebSite'] ?>" title="" class="tooltip urllink"> <img src="<?php echo base_url();?>iconos/url.png" alt="Ir al Sitio Web" > <span>Ir al WebSite</span></a>
          <?php } ?>
          <div class="butons"><a href="<?php echo base_url().'alojamiento/'.$var['Url'] ?>" title="Ampliar Informacion del Alojamiento" onclick="_gaq.push(['_trackEvent','ficha','vista','<?php echo $var['Nombre']; ?>']);">Ampliar Info >></a></div>
        </div>
      </div>
      <?php }
      // PUBLICIDAD BASICA =1
      else { ?>
      <div class="itemsB" >
        <h3 itemprop="name"><?php echo $name_T." ".ucwords($var['Nombre']); ?></h3>
        <!-- EMAIL-->
        <?php if (isset($var['Email'])){ ?>
        <a href="<?php echo base_url()."form_list.php?id=".$var['ID_Alojamiento']."&email=".$var["Email"]."&bu=".base_url()."&tipo_ae=alojar&name_ae=".$name_T." ".$var['Nombre'];?>" title="<?php echo $name_T." ".ucwords($var['Nombre']); ?>- <?php echo $this->config->item('ciudadweb');; ?> - Ver Ficha Informacion" class="tooltip xleft femail"> <img src="<?php echo base_url();?>iconos/email_f2.png" alt="" > <span><b>Haga click </b>en Icono para enviar email a este alojamiento</span>
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
      <?php $z++; ?>
      <?php endforeach ?>
    </div>
    <?php } ?>
  </div>
  <!-- FIN CONT MARGIN-->
</div>
<!-- FIN CONT FULL-->
</div>
<!-- END CONTENEDOR-->
<script type="text/javascript" async="async" defer="defer" src="https://dattachat.com/chat/cargar/wid/51b78919535a2659791174"></script>
<a href="javascript:;" onclick="dcJs.startSend()"><img style="border:0px;" id="dc_ImgStatus" src="https://dattachat.com/chat/img/wid/51b78919535a2659791174" /></a>