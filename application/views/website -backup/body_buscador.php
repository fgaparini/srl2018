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
// funcion Minimo precio
function getMin( $array )
{
$max = 100000;
foreach( $array as $k => $v )
{
$max = min( array( $max, $v['totalM'] ) );
}
if($max==100000)
{$max =""; return $max;} else {
return $max;
}
}
?>
<div id="contenedor2">
  <div id="cont_full">
    <!-- BEGUIN CONT FULL-->
    <div id="toplinks" align="left"><span>Buscador Alojamientos > <?php echo $tipoBus ?> en San Rafael </span></div>
    <div class="cont_margin" align="left">
     
      <h1><?php echo $tipoBus ?> en San Rafael</h1>
      <br>
      <span> Encuentre alojamientos en San Rafael, puede selecionar un alojamiento con tarifas y realizar un prereseva Online! .. </span>
 <br>
      <div id="buscaLeft">
        <div id="Busca-Busca" align="left">
          
          <h2>Tu Busqueda</h2>
          <div class=""><label for="in">Llegada</label><br><input type="text" class="fechass" value="<?php echo $desde2; ?>" id="from"></div>
          <div class=""><label for="out">Salida</label><br><input type="text" value="<?php echo $hasta2; ?>" id="to"></div>
          <div class="select"><label for="tipo">Tipo alojamiento</label>
          <select name="tipo" id="tipo">
            <?php foreach ($Tipo_A as $var) { ?>
            <option value="<?php echo $var['UrlAlojamiento'] ;?>" <?php if($var['TituloAlojamiento']==$tipoBus){echo 'selected';} ?> ><?php echo $var['TituloAlojamiento'];  ?></option>
            <?php } ?>
          </select>
          </div>
          <div align="right" class="buttondiv"><button onclick="_gaq.push(['_trackEvent','Busqueda','Nueva','']);">Nueva Busqueda</button> </div>
          <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl">
        
      </div>
      <div id="res0800" align="center">
        <span class="reservar">Reservas al</span><br>
        <span class="r0800">0800 122 5588</span><br>
        <span class="infohora">Lun. a Sab.  de 9h a 22h <br></span>
      </div>
      <div><a href="www.mercadolibre.com.ar/promociones-bancos" title="Promociones de Pago con tarjeta Sin Interes"><img src="<?php echo base_url()."imagenes/mercadopago.jpg" ?>" alt=" Pague en Hasta 12 Cuotas sin Interes! - San Rafael Late"></a>
</div>
    </div>
      <div id="buscaRight">
        <div id="filtrosup"> <span>Filtrar Alojamientos:</span> 
         <select name="filtrob" id="filtrob">
          <option value="todos" selected >todos</option>
          <option value="comun">Con Tarifa</option>
          <option value="reserva">Sin Tarifa</option>
         </select>
       </div>
        <!--LISTO  ALOJAMIENTOS -->
        <?php 
        if (Count($alojar)>0) {
        foreach ($alojar as $var)
        {
        //OBTENGO O NO HABITACION X ALOJAMIENTO
        $habitaciones=$this->dbbuscador->habitaciones($var['ID_Alojamiento'],$desde,$hasta);
        if (count($habitaciones)>0) {
         $contH=count(array_filter($habitaciones));
        } else {   $contH=0;}
       
       

        $localidad=$this->dbbuscador->localidad($var['Localidad']);
      
     

        if ($contH>0) {
         
        $minprice= getMin(array_filter($habitaciones));
        } else {$minprice="";}
        
        ?>
        <!--COMIENZO  ALOJAMIENTOS -->
        <div class="list_B"  <?php if ($contH>0) { echo 'rel="reserva"'; echo ' id="'. $var['ID_Alojamiento'].'"'; } else {echo 'rel="comun"'; echo ' id="'. $var['Url'].'"';} ?> >
          <!--IMAGEN  ALOJAMIENTOS -->
          <div class="imag"><img src="<?php echo base_url()."upload/alojamientos/thumb/".$var['ID_Alojamiento']."_1_p.jpg"; ?>" alt=""></div>
          <!--INFOMACION  ALOJAMIENTOS -->
          <div class="info">
            <!--Nombre -->
            <div class="infal"><h2><?php echo $var['Nombre']; ?></h2> <p class="localidad"><b>Ubicación:</b> <?php echo $localidad;  ?> - San Rafael</p><p class="descp"><?php echo  acortar($var['Descripcion'],100); ?> ...</p></div>
            <!--Tarifas -->
            <div class="price" align="middle"><?php if($minprice !=""){ ?>desde <h3 class="precio">$<?php echo $minprice ?></h3>Por <?php echo $cant_dias; ?> noches <button id="<?php echo $var['ID_Alojamiento']; ?>" class="selecA" onclick="_gaq.push(['_trackEvent','buscadorA','Reservar','<?php echo $var['Nombre']; ?>']);">Seleccionar</button><?php } else {?><span>No tenemos tarifas</span><br><button class="consulta" id="<?php echo $var['Url'] ?>" onclick="_gaq.push(['_trackEvent','BuscadorA','consulta','<?php echo $var['Nombre']; ?>']);">Consultar</button><?php } ?></div><br>
          </div>
          <?php
          if ($contH>0) {?>
          <!--Tarifas -->
          <div class="cantdias" align="right">
            <div>Precio x <?php echo $cant_dias; ?> noches</div>
          </div>
          <div class="hab">
            <?php
            $i=1;
            foreach ($habitaciones as $var2)
            {
            if (isset($var2['NombreHab']) & $i<5) {
            
            
            
            ?>
            <!--Nombre Hab -->
            <div class="namehab"><?php  echo $var2['UnidadAlojativa'].' '.$var2['NombreHab']. '('.$var2['TipoHabitacion'].')'; ?>
              <?php if ($var2['totalM']>0 & $var2['totalM']<$var2['totalN'] ) {
              $porcdescuent[$var2['NombreHab']]=round((1-$var2['totalM']/$var2['totalN'])*100);
              echo '<span class="porc-oferta">'.$porcdescuent[$var2['NombreHab']].'% OFF</span>';
              } ?>
            </div>
            <!--Desayuno -->
            <div class="desy"><?php if ($var2['Desayuno']!="Sin desayuno" ) {echo "c/ Desayuno ". $var2['Desayuno'];} else {echo "Sin Desayuno";} ?>
            </div>
            <!--TARIFAS -->
            <?php if ($var2['totalM']<$var2['totalN']) {
            echo "<div class='pricexhab' align='right'> <span class='tachado'>$".$var2['totalN']."</span> $".$var2['totalM']."</div>";
            
            
            }else {echo "<div class='pricexhab' align='right'> $".$var2['totalN']."</div>";
            
            } ?>
            
            <?php     }
            $i++; } ?>
          </div> <?php } 
          ?>
        </div>
        
        <?php
        } } else {echo "No hay alojamientos para esta categoria.";}
        ?>
      </div>
      
      
      
    </div>
    <!-- FIN CONT MARGIN-->
  </div>
  <!-- FIN CONT FULL-->
</div>
<!-- END CONTENEDOR-->
<!-- <script type="text/javascript" async="async" defer="defer" src="https://dattachat.com/chat/cargar/wid/51b78919535a2659791174"></script>
<a href="javascript:;" onclick="dcJs.startSend()"><img style="border:0px;" id="dc_ImgStatus" src="https://dattachat.com/chat/img/wid/51b78919535a2659791174" /></a> -->