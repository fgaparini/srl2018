 <!--
====================================
BEGUIN CONTENIDOS
====================================
-->
<div id="contenedor2">

 <div id="cont_full">
         <!-- BEGUIN CONT FULL-->
      <div id="toplinks" align="left"><b>Estas en: </b><a href="http://sanrafaellate.com" title="Ir a home">Home</a> >> <a href="<?php echo base_url().'servicios/'.$tipoempresas['TipoEmpresa'];?>" title="<?php echo $tipoempresas['TituloEmpresa']; ?>"> <?php echo $tipoempresas['TituloEmpresa']; ?></a> </div>
      <div class="cont_margin" >
     

          <div class="cont_D">
            
          <div align="left">
            <h1><?php echo $titulo_E; ?></h1>
          </div>
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


