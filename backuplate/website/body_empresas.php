 <!--
====================================
BEGUIN CONTENIDOS
====================================
--> <div id="contenedor2">

 <div id="cont_full">
   <!-- BEGUIN CONT FULL-->
       <div id="toplinks" align="left"><b>Estas en: </b><a href="http://sanrafaellate.com" title="Ir a home">Home</a> >> <a href="<?php echo base_url().'servicios/'.$TipoEmpresa['TipoEmpresa'];?>" title="<?php echo $TipoEmpresa['TituloEmpresa']; ?>"> <?php echo $TipoEmpresa['TituloEmpresa']; ?></a> >> <?php echo $subtipo['TituloSubEmpresa'] ?></div>
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
 <div class="publi500x80"><?php $this->load->view('website/ads_google_468'); ?></div>
</div>
  <!--  CONTENEDOR PUBLICIDAD -->
  <div id="asd_busca" align="center">
    <div class="publi250x250"><?php $this->load->view('website/ads_google_250'); ?></div>




</div> </div>
<div align="left">
  <h1><?php echo $titulo_E; ?></h1>
</div>
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


