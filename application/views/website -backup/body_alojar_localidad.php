 <!--
====================================
BEGUIN CONTENIDOS
====================================
--> <div id="contenedor2">

 <div id="cont_full">
   <!-- BEGUIN CONT FULL-->
       <div id="toplinks" align="left"><b>Estas en: </b><a href="<?php echo base_url(); ?>" title="Ir a home">Home</a> >> <a href="<?php echo base_url().'/alojamientos/alojamientos.html';?>" title="Alojamientos en <?php echo $this->config->item('ciudadweb');; ?>"></a> <?php echo $titulo_p; ?> -  San <?php echo $this->config->item('ciudadweb');; ?></div>
<div class="cont_margin" >
<div id="buscar_FULL" align="left">
  <!--  CONTENEDOR BUSCADOR E ENVIO MULTIPLE -->
  <div class="leftC">
  <div id="buscador_aloja"><h2>Buscador de Alojamientos</h2>
<p>Busca tu alojamiento ideal online!.. consulta disponibilidad , tarifas, servicios, etc en tiempo real de manera facil sencilla y <b>paga en 12 cuotas sin interes!!</b></p>
    <div><label for="arivo">Llegada:</label><input type="text" id="from"></div>
    <div><label for="salida">Salida:</label><input type="text" id="to"></div>
    <div><label for="">Tipo:</label><select name="tipo" id="tipo">
        <?php foreach ($row_T as $var) {
        echo "<option value=".$var['ID_TipoAlojamiento'].">".$var['TipoAlojamiento']."</option>";
      } ?>
    </select> </div>
    <div align="right"><button>Buscar..</button></div>
  </div>
 <div align="center">
 <div class="publi500x80" ><?php $this->load->view('website/ads_google_468'); ?></div>
</div>
</div>
  <!--  CONTENEDOR PUBLICIDAD -->
  <div id="asd_busca" align="center">
    <div class="publi250x250"><?php $this->load->view('website/ads_google_250'); ?></div>




</div> </div>
<div align="left">
  <h1><?php echo $titulo_p;  ?></h1>

</div>
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


