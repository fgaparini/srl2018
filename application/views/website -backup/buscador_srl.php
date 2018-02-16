<div id="buscadorC" align="left">
  <h2>Buscador de Alojamientos</h2>
  <div class=""><label for="in">Llegada</label><br><input type="text" class="fechass" value="fecha Llegada" id="from"></div>
  <div class=""><label for="out">Salida</label><br><input type="text" value="Fecha Salida" id="to"></div>
  <div><label for="tipo">Tipo alojamiento</label>
  <select name="tipo" id="tipo">
    <?php foreach ($Tipo_A as $var) { ?>
    <option value="<?php echo $var['UrlAlojamiento'] ;?>"><?php echo $var['TituloAlojamiento'];  ?></option>
    <?php } ?>
  </select>
</div>
<div align="center"><button id="buscaralojar" onclick="_gaq.push(['_trackEvent','Busquedahome','home','']);">Buscar..</button> </div>
</div>