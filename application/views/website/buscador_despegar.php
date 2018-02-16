<div id="buscadorC" align="left">
  <h2>Reserva Online !!</h2>
  <div class=""><label for="in">Llegada</label><br><input type="text" class="fechass" value="fecha Llegada" id="from"></div>
  <div class=""><label for="out">Salida</label><br><input type="text" value="Fecha Salida" id="to"></div>
  <div><label for="tipo">Personas</label>
  <select name="personas" id="personas">
        <?php for ($f=1; $f < 8 ; $f++) { ?>
   <option value="<?php echo $f ;?>"><?php echo $f  ?></option>
    <?php } ?>
  </select> 
</div>
<div align="center"><button id="buscardespegar" onclick="_gaq.push(['_trackEvent','Busquedadepegar','despegar','']);">Buscar !</button> </div>
</div>